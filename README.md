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

Require `orchestra/html`, `flash`, `active`, `authorization` and `administration` in your `composer.json` file:

```json
"orchestra/html": "~3.2",
"stevebauman/flash": "1.0.*",
"stevebauman/active": "1.0.*"
"stevebauman/authorization": "1.3.*",
"stevebauman/administration": "1.0.*"
```

These are required so you can remove `stevebauman/administration` afterwards.

Run `composer update`.

Insert the following providers in your `config/app.php`:

```php
Stevebauman\Authorization\AuthorizationServiceProvider::class,
Stevebauman\Administration\AdministrationServiceProvider::class,
```

Now run `php artisan vendor:publish --tag="authorization"`.

Then run `php arisan vendor:publish --tag="administration"`.

You can now remove the `Stevebauman\Administration\AdministrationServiceProvider` from your `config/app.php` file:

<del>`Stevebauman\Administration\AdministrationServiceProvider::class`,</del>

Then remove `stevebauman/administration` from your `composer.json` file:

<del>`"stevebauman/administration": "1.0.*"`</del>

Run `composer update`.

Now insert the following providers in your `config/app.php`:

```php
App\Providers\AdminRouteServiceProvider::class,
App\Providers\HtmlServiceProvider::class,
```

Once you've done that, visit your site `localhost/admin/setup` to
create an administrator account.

You're all set!

## Usage
