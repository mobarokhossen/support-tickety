<?php

namespace YourName\LaravelTicket;

use Illuminate\Support\ServiceProvider;

class LaravelTicketServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/ticket.php' => config_path('ticket.php'),
        ], 'config');

        // Publish migrations
        if (!class_exists('CreateTicketsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_tickets_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_tickets_table.php'),
                __DIR__ . '/../database/migrations/create_ticket_categories_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_ticket_categories_table.php'),
            ], 'migrations');
        }

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-ticket');

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-ticket'),
        ], 'views');
    }

    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/ticket.php', 'ticket'
        );
    }
}
