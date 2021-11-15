$menu->raw('Components', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');

                $menu->add('<span>UI Elements</span>', ['class' => ''])
                    ->prepend('<i class="ri-pencil-ruler-line"></i>')
                    ->nickname('ui_elements')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#ui_elements');
        
                    $menu->ui_elements->add('<span>Colors</span>', ['route' => 'ui-color'])
                        ->active('ui-color/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Typography</span>', ['route' => 'ui-typography'])
                        ->active('ui-typography/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Alerts</span>', ['route' => 'ui-alert'])
                        ->active('ui-alert/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Badges</span>', ['route' => 'ui-badges'])
                        ->active('ui-badges/*')
                        ->link->attr(['class' => '']);
                
                    $menu->ui_elements->add('<span>Breadcrumb</span>', ['route' => 'ui-breadcrumb'])
                        ->active('ui-breadcrumb/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Buttons</span>', ['route' => 'ui-button'])
                        ->active('ui-button/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Cards</span>', ['route' => 'ui-card'])
                        ->active('ui-card/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Carousel</span>', ['route' => 'ui-carousel'])
                        ->active('ui-carousel/*')
                        ->link->attr(['class' => '']);
                        
                    $menu->ui_elements->add('<span>Video</span>', ['route' => 'ui-video'])
                        ->active('ui-video/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Grid</span>', ['route' => 'ui-grid'])
                        ->active('ui-grid/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Images</span>', ['route' => 'ui-images'])
                        ->active('ui-images/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Group</span>', ['route' => 'ui-listgroup'])
                        ->active('ui-listgroup/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Media</span>', ['route' => 'ui-media'])
                        ->active('ui-media/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Modal</span>', ['route' => 'ui-modal'])
                        ->active('ui-modal/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Notifications</span>', ['route' => 'ui-notifications'])
                        ->active('ui-notifications/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Pagination</span>', ['route' => 'ui-pagination'])
                        ->active('ui-pagination/*')
                        ->link->attr(['class' => '']);
                        
                    $menu->ui_elements->add('<span>Popovers</span>', ['route' => 'ui-popovers'])
                        ->active('ui-popovers/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Progressbars</span>', ['route' => 'ui-progressbars'])
                        ->active('ui-progressbars/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Tabs</span>', ['route' => 'ui-tabs'])
                        ->active('ui-tabs/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Tooltips</span>', ['route' => 'ui-tooltips'])
                        ->active('ui-tooltips/*')
                        ->link->attr(['class' => '']);
            
                $menu->add('<span>Forms</span>', ['class' => ''])
                    ->prepend('<i class="ri-profile-line"></i>')
                    ->nickname('forms')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#forms');
        
                    $menu->forms->add('<span>Form Elements</span>', ['route' => 'form-layout'])
                        ->active('form-layout/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms->add('<span>Form Validation</span>', ['route' => 'form-validation'])
                        ->active('form-validation/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms->add('<span>Form Switch</span>', ['route' => 'form-switch'])
                        ->active('form-switch/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms->add('<span>Form Checkbox</span>', ['route' => 'form-chechbox'])
                        ->active('form-chechbox/*')
                        ->link->attr(['class' => '']);
                
                    $menu->forms->add('<span>Form Radio</span>', ['route' => 'form-radio'])
                        ->active('form-radio/*')
                        ->link->attr(['class' => '']);
                
                $menu->add('<span>Forms Wizard</span>', ['class' => ''])
                    ->prepend('<i class="ri-archive-drawer-line"></i>')
                    ->nickname('forms_wizard')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#forms_wizard');
        
                    $menu->forms_wizard->add('<span>Simple Wizard</span>', ['route' => 'form-wizard'])
                        ->active('form-wizard/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms_wizard->add('<span>Validate Wizard</span>', ['route' => 'validate-wizard'])
                        ->active('validate-wizard/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms_wizard->add('<span>Vertical Wizard</span>', ['route' => 'vertical-wizard'])
                        ->active('vertical-wizard/*')
                        ->link->attr(['class' => '']);
                $menu->add('<span>Table</span>', ['class' => ''])
                    ->prepend('<i class="ri-table-line"></i>')
                    ->nickname('table')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#table');
        
                    $menu->table->add('<span>Basic Tables</span>', ['route' => 'basic-table'])
                        ->active('basic-table/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->table->add('<span>Data Table</span>', ['route' => 'data-table' ])
                        ->active('data-table/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->table->add('<span>Editable Table</span>', ['route' => 'edit-table' ])
                        ->active('edit-table/*')
                        ->link->attr(['class' => '']);

                $menu->add('<span>Charts</span>', ['class' => ''])
                    ->prepend('<i class="ri-pie-chart-box-line"></i>')
                    ->nickname('charts')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#charts');
        
                    $menu->charts->add('<span>Morris Chart</span>', ['route' => 'chart-morris'])
                        ->active('chart-morris/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->charts->add('<span>High Charts</span>', ['route' => 'chart-high'])
                        ->active('chart-high/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->charts->add('<span>Am Charts</span>', ['route' => 'chart-am'])
                        ->active('chart-am/*')
                        ->link->attr(['class' => '']);

                    $menu->charts->add('<span>Apex Chart</span>', ['route' => 'chart-apex'])
                        ->active('chart-apex/*')
                        ->link->attr(['class' => '']);

                $menu->add('<span>Icons</span>', ['class' => ''])
                    ->prepend('<i class="ri-list-check"></i>')
                    ->nickname('icons')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#icons');
        
                    $menu->icons->add('<span>Dripicons</span>', ['route' => 'icon-dripicons'])
                        ->active('icon-dripicons/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->icons->add('<span>Font Awesome</span>', ['route' => 'icon-fontawesome'])
                        ->active('icon-fontawesome/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->icons->add('<span>Line Awesome</span>', ['route' => 'icon-lineawesome'])
                        ->active('icon-lineawesome/*')
                        ->link->attr(['class' => '']);

                    $menu->icons->add('<span>Remixicon</span>', ['route' => 'icon-remixicon'])
                        ->active('icon-remixicon/*')
                        ->link->attr(['class' => '']);

                    $menu->icons->add('<span>Unicons</span>', ['route' => 'icon-unicons'])
                        ->active('icon-unicons/*')
                        ->link->attr(['class' => '']);
                
                $menu->raw('Pages', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');
                    
                    $menu->add('<span>Authentication</span>', ['class' => ''])
                        ->prepend('<i class="ri-pages-line"></i>')
                        ->nickname('authentication')
                        ->link->attr(["class" => "nav-link iq-waves-effect"])
                        ->href('#authentication');
            
                        $menu->authentication->add('<span>Login</span>', ['route' => 'login'])
                            ->active('login/*')
                            ->link->attr(['class' => '']);
                
                        $menu->authentication->add('<span>Register</span>', ['route' => 'registration'])
                            ->active('registration/*')
                            ->link->attr(['class' => '']);

                        $menu->authentication->add('<span>Recover Password</span>', ['route' => 'recover-password'])
                            ->active('recover-password/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->authentication->add('<span>Confirm Mail</span>', ['route' => 'confirm-email'])
                            ->active('confirm-email/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->authentication->add('<span>Lock Screen</span>', ['route' => 'lock-screen'])
                            ->active('lock-screen/*')
                            ->link->attr(['class' => '']);

                    $menu->add('<span>Maps</span>', ['class' => ''])
                        ->prepend('<i class="ri-map-pin-user-line"></i>')
                        ->nickname('maps')
                        ->link->attr(["class" => "nav-link iq-waves-effect"])
                        ->href('#maps');
            
                        $menu->maps->add('<span>Google Map</span>', ['route' => 'google-map'])
                            ->active('google-map/*')
                            ->link->attr(['class' => '']);

                    $menu->add('<span>Extra Pages</span>', ['class' => ''])
                        ->prepend('<i class="ri-pantone-line"></i>')
                        ->nickname('extrapages')
                        ->link->attr(["class" => "nav-link iq-waves-effect"])
                        ->href('#extrapages');
            
                        $menu->extrapages->add('<span>Timeline</span>', ['route' => 'timeline'])
                            ->active('timeline/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Invoice</span>', ['route' => 'invoice'])
                            ->active('invoice/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Blank Pages</span>', ['route' => 'blank-pages'])
                            ->active('blank-pages/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->extrapages->add('<span>Error 404</span>', ['route' => 'error-400'])
                            ->active('error-400/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Error 500</span>', ['route' => 'error-500'])
                            ->active('error-500/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->extrapages->add('<span>Pricing</span>', ['route' => 'pricing'])
                            ->active('pricing/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Pricing 1</span>', ['route' => 'pricing-one'])
                            ->active('pricing-one/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Maintenance</span>', ['route' => 'maintenance'])
                            ->active('maintenance/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Coming Soon</span>', ['route' => 'comingsoon'])
                            ->active('comingsoon/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->extrapages->add('<span>Faq</span>', ['route' => 'faq'])
                            ->active('faq/*')
                            ->link->attr(['class' => '']);

                $menu->add('<span>Menu Level</span>', ['class' => ''])
                    ->prepend('<i class="ri-record-circle-line"></i>')
                    ->nickname('menu_level')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#menu_level');
        
                    $menu->menu_level->add('<span>Menu 1</span>','#')
                        ->prepend('<i class="ri-record-circle-line"></i>')
                        ->link->attr(['class' => '']);
                    
                    $menu->menu_level->add('<span>Menu 2</span>','#')
                        ->prepend('<i class="ri-record-circle-line"></i>')
                        ->link->attr(['class' => '']);

                    $menu->menu_level->add('<span>Menu 3</span>','#')
                        ->prepend('<i class="ri-record-circle-line"></i>')
                        ->link->attr(['class' => '']);
                    
                    $menu->menu_level->add('<span>Sub Menu</span>')
                        ->prepend('<i class="ri-play-circle-line"></i>')
                        ->nickname('sub_menu')
                        ->link->attr(['class' => ''])
                        ->href('#sub_menu');

                        $menu->sub_menu->add('<span>Sub Menu 1</span>' ,'#')
                        ->prepend('<i class="ri-record-circle-line"></i>')
                        ->link->attr(['class' => '']);
                    
                        $menu->sub_menu->add('<span>Sub Menu 2</span>','#')
                            ->prepend('<i class="ri-record-circle-line"></i>')
                            ->link->attr(['class' => '']);

                        $menu->sub_menu->add('<span>Sub Menu 3</span>','#')
                            ->prepend('<i class="ri-record-circle-line"></i>')
                            ->link->attr(['class' => '']);

                    $menu->menu_level->add('<span>Menu 4</span>','#')
                        ->prepend('<i class="ri-record-circle-line"></i>')
                        ->link->attr(['class' => '']);