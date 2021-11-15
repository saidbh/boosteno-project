require('./bootstrap');
import axios from "axios";

let initAxios =  axios.create({
  baseURL: window.location.protocol+"//"+window.location.host+"/"/* +window.location.pathname.split('/')[1] */,
  headers: { 'content-type': 'application/json' },
  responseType:'json',
})

let axiosRequest = () => {
  let token = (localStorage.getItem("token") == null)?null:localStorage.getItem("token");
  initAxios.defaults.headers["Authorization"] = "Bearer "+token;
  return initAxios;
}

document.getElementById("formSender").addEventListener("submit", function (e) {
  e.preventDefault();
  parseForm(e.target.elements, e.target.dataset.to, e.target.dataset.method, e.target.dataset.title);
  return false;
})

let parseForm = (formElems, url, method, title) => {
  var formData = {};
  for (let i = 0; i < formElems.length; i++) {
    if(!["submit", "send", "buttton"].includes(formElems[i].type)){
      switch (formElems[i].type) {
        case "checkbox":
          formData[formElems[i].name] = formElems[i].checked;
          break;
        case "radiobox":
          break;
        default:
          formData[formElems[i].name] = formElems[i].value;
      }
    }
  }
  sendRequest(method,url,formData,title);
}

const sendRequest = (method, url, data, title) => {
  //document.getElementById("formSubmitter").disabled = true;
  switch (method.toLowerCase()) {
    case "post":
      axiosRequest().post(url, JSON.stringify(data))
      .then(res=>{
        //document.getElementById("formSubmitter").disabled = false;
        let resData = res.data;
        if(resData.error){
          if(resData.title != null || resData.title != "") {
            responseRequest(resData.error, resData.title, resData.message);
          } else if(title != null || title != ""){
            responseRequest(resData.error, title, resData.message);
          }
        } else {
          if(resData.title != null || resData.title != "") {
            responseRequest(resData.error, resData.title, resData.message);
          } else if(title != null || title != ""){
            responseRequest(resData.error, title, resData.message);
          }
        }
      }).catch(err=>{
        //document.getElementById("formSubmitter").disabled = false;
      });
      break;
    case "get":
      return axiosRequest().get(url)
      .then(res=>{
        //document.getElementById("formSubmitter").disabled = false;
      }).catch(err=>{
        //document.getElementById("formSubmitter").disabled = false;
      });
    case "put":
      return axiosRequest().put(url)
      .then(res=>{
        //document.getElementById("formSubmitter").disabled = false;
      }).catch(err=>{
        //document.getElementById("formSubmitter").disabled = false;
      });
    case "delete":
      return axiosRequest().delete(url)
      .then(res=>{
        //document.getElementById("formSubmitter").disabled = false;
      }).catch(err=>{
        //document.getElementById("formSubmitter").disabled = false;
      });
    default: {
      //document.getElementById("formSubmitter").disabled = false;
      return false
    };
  }
}

const responseRequest = (type,title,message) => {
  var formResponse = $('#formResponse');
  formResponse.find('#responseTitle').text(title);
  formResponse.find('#responseMessage').text(message);
  formResponse.toast("show");
}