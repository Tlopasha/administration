# Administration

Administration is a different kind of administrator package for Laravel. We take a completely different approach to
the administrator backend. All assets are published, meaning you're free to modify absolutely everything about the backend.

Administration makes no assumptions to how to you want your backend, it merely scaffolds an entire administration panel
for your current application, complete with a secure setup process.

Every application is different, and you shouldn't be locked into an administrator panel managed by a different developer.

## Features

- Setup wizard for easy deployment (no console commands required)
- User management with user specific permissions
- Permission Management
- Role Management
- Clean, customizable UI
- Thoroughly documented code with 100% customizability
- Thoroughly implements clean separation of concerns
- Completely mobile compatible with 100% responsive layout (using Bootstrap 3)
- Pjax implementation for an app-like feel

## Installation

Require `administration` in your `composer.json` file:

```json
"stevebauman/administration": "1.0.*"
```

Run `composer update`.

Insert the following providers in your `config/app.php`:

```php
Stevebauman\Authorization\AuthorizationServiceProvider::class,
Stevebauman\Administration\AdministrationServiceProvider::class,
```

Now run `php artisan vendor:publish --tag="authorization"`.

Then run `php arisan vendor:publish --tag="administration"`.

Now insert the following providers in your `config/app.php`:

```php
App\Providers\AdminRouteServiceProvider::class,
App\Providers\HtmlServiceProvider::class,
```

Once you've done that, visit your site `localhost/admin/setup` to
create an administrator account.

You're all set!

## Usage
