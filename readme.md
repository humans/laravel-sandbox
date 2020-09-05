# Laravel Sandbox

Laravel Sandbox is a package to easily add front-end support to database factories.

## Installation

```bash
composer require humans/laravel-sandbox
```

## Create your first Sandbox
Sandbox provides an artisan command to create a sandbox class. All files are added to your `app/Sandbox` folder.

```bash
php artisan sandbox:make SalesDemo
```

## Register your Sandbox in a Service Provider
The Sandboxes needs to be registered to something something.

```php
Sandbox::register([
    \App\Sandbox\SalesDemo::class,
]);
```

## Add functionality to your Sandbox

```php
use Auth;
use Humans\Sandbox\Contracts\RefreshDatabase;
use Humans\Sandbox\Sandbox;

class SalesDemo extends Sandbox implements RefreshDatabase
{
    public function run()
    {
        Auth::login(
             factory(\App\User::class)->create()
        );

        return redirect()->route('home');
    }
}
```

## Create a view for your sandboxes.

```html
@foreach (Sandbox::sandboxes() as $sandbox)
  <h3>{{ $sandbox->title() }}</h3>
  <form method="POST" action="{{ route('sandbox.run') }}">
    @csrf
    <input type="hidden" name="sandbox" value="{{ $sandbox->id() }} >
    <button>Run</button>
  </form>
@endforeach
```

Make sure to add the prefix to the route name if you used a route name prefix.
