set :application, "evercodelab"
set :domain,      "213.239.207.106"
set :deploy_to,   "/var/www/php/#{application}.com"
set :app_path,    "app"

set :repository,  "git@github.com:EvercodeLab/#{application}.git"
set :scm,         :git
set :branch, "master"

default_run_options[:pty] = true
set :ssh_options, {:forward_agent => true, :port => 22}
set :user, "deployer"
set :use_sudo, false
set :deploy_via, :remote_cache

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Symfony2 migrations will run

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]
set :dump_assetic_assets, true
set :use_composer, true
set :update_vendors, false
set :symfony_env_prod, "prod"

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

set :writable_dirs,     ["app/cache", "app/logs"]
set :webserver_user,    "www-data"
set :permission_method, :acl

require 'hipchat/capistrano'

set :hipchat_token, "915640c1f2d58ebf5d79d8ce4c1cd6"
set :hipchat_room_name, "Github"
set :hipchat_announce, false # notify users
set :hipchat_color, 'green' #finished deployment message color
set :hipchat_failed_color, 'red' #cancelled deployment message color