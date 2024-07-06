<?php

namespace MobarokLab\SupportTickety;

use Illuminate\Support\ServiceProvider;

class SupportTicketServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__ . '/config/support-ticket.php' => config_path('support-ticket.php'),
        ], 'config');

        // Publish migrations
        if (!class_exists('CreateSupportTicketsTable')) {
            $this->publishes([
                __DIR__ . '/database/migrations/create_support_tickets_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_support_tickets_table.php'),
                __DIR__ . '/database/migrations/create_support_categories_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_support_categories_table.php'),
            ], 'migrations');
        }

        // Load the views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'support-tickety');

        // Publish the views
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/support-tickety'),
        ]);
    }

    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/config/support-ticket.php', 'support_tickety'
        );
    }
}
