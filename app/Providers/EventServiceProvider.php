<?php

namespace App\Providers;

use App\Models\Local;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $estado_local = Local::orderBy('created_at','desc')->first();

           //dd($estado_local);
           if(Auth::user()->rol=='admin' || Auth::user()->rol=='peluquero'){
            if (isset($estado_local->estado)) {
                if ($estado_local->estado == 'C') {
                    $event->menu->add([
                        'text' => 'Servicio Cerrado',
                        'topnav_right' => 'true',
                        'classes' => 'text-bold',
                        'icon' => 'fas fa-fw fa-toggle-off',
                        'submenu' => [
                            [
                                'text' => 'Activar Servicio', //Agregar el ítem Activar turno si esta cerrado
                                'route' => ['estado_local', ['tipo_estado' => 'A']],
                                'icon' => 'fas fa-fw fa-toggle-on',
                                'icon_color' => 'success',
                                'id' => 'activar_Servicio',
                            ],

                        ],
                    ]);
                } elseif ($estado_local->estado == 'A') {
                    $event->menu->add([
                        'text' => 'Servicio Abierto',
                        'topnav_right' => 'true',
                        'classes' => 'text-bold',
                        'icon_color' => 'success',
                        'icon' => 'fas fa-fw fa-toggle-on',
                        'submenu' => [
                            [
                                'text' => 'Cerrar Servicio', //Agregar el ítem Activar turno si esta cerrado
                                'route' => ['estado_local', ['tipo_estado' => 'C']],
                                'icon' => 'fas fa-fw fa-toggle-off',
                                'id' => 'activar_Servicio',
                            ],
                            [
                                'text' => 'Ausentarse', //Agregar el ítem Activar turno si esta cerrado
                                'route' => ['estado_local', ['tipo_estado' => 'S']],
                                'icon' => 'fas fa-fw fa-circle',
                                'icon_color' => 'orange',
                            ],

                        ],
                    ]);
                } elseif ($estado_local->estado == 'S') {
                    $event->menu->add([
                        'text' => 'Ausente',
                        'topnav_right' => 'true',
                        'classes' => 'text-bold',
                        'icon' => 'fas fa-fw fa-circle',
                        'icon_color' => 'orange',
                        'submenu' => [
                            [
                                'text' => 'Activar Servicio', //Agregar el ítem Activar turno si esta cerrado
                                'route' => ['estado_local', ['tipo_estado' => 'A']],
                                'icon' => 'fas fa-fw fa-toggle-on',
                                'icon_color' => 'success',
                                'id' => 'activar_Servicio',
                            ],

                        ],
                    ]);
                }
            } else {
                $event->menu->add([
                    'text' => 'Servicio Cerrado',
                    'topnav_right' => 'true',
                    'classes' => 'text-bold',
                    'icon' => 'fas fa-fw fa-toggle-off',
                    'submenu' => [
                        [
                            'text' => 'Activar Servicio', //Agregar el ítem Activar turno si esta cerrado
                            'route' => ['estado_local', ['tipo_estado' => 'A']],
                            'icon' => 'fas fa-fw fa-toggle-on',
                            'icon_color' => 'success',
                            'id' => 'activar_Servicio',
                        ],

                    ],
                ]);
            }
        }
        });
    }
}
