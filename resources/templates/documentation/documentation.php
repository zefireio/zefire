@extends('layout.master')

<div class="container">
  
  <div class="doc-body">
    <div class="doc-content">
      <div class="content-inner">
        
        <section id="zefire" class="doc-section">
          <h2 class="section-title">Zefire Framework documentation</h2>
          <p>Zefire is a web application framework which attempts to provides an elegant and easy to use set of features common to most of web projects, such as:</p>
          <ul class="list">
            <li>Inversion Of Control</li>
            <li>ORM and Database layer</li>
            <li>Routing</li>
            <li>Template Engine</li>
            <li>Queueing</li>
            <li>Events</li>
            <li>Console</li>
            <li>Middlewares</li>
            <li>Conventional back-end features, (such as Sessions, caching, storage, etc)</li>
          </ul>
          <p>Zefire was designed to be fairly light yet powerful enough to provide tools needed for most projects.</p>          
        </section>

        <section id="getting-started" class="doc-section">
          <h2 class="section-title">Getting started</h2>
          <div id="requirements" class="section-block">
            <h3 class="block-title">Server requirements</h3>
            <p>Zefire framework requirements would be satisfied by using a <a href="https://laravel.com/docs/5.6/homestead" target="_blank">Homestead</a> virtual machine wich would make it really easy.</p>
            <p>However, if you do not want to use Homestead, you will need to make sure your server meets the following requirements:</p>
            <h6>Server requirements</h6>
            <ul class="list">
              <li>PHP >= 7.1.3</li>
              <li>OpenSSL PHP Extension</li>
              <li>PDO PHP Extension</li>
              <li>Mbstring PHP Extension</li>
            </ul>
          </div>
          <div id="download" class="section-block">
            <h3 class="block-title">Download</h3>
            <p>Zefire is devided into two code repositories. One for the "App" side of things, and another for the framework. So in order to get yourself going, you need to download <a href="https://github.com/zefireio/zefire" target="_blank">Zefire App</a> from Github.</p>
          </div>
          <div id="installation" class="section-block">
            <h3 class="block-title">Installation</h3>
            <p>Zefire uses <a href="https://getcomposer.org/" target="_blank">Composer</a> to manage its dependencies. So, before using Zefire, make sure you have Composer installed on your machine. Then, just run composer update to download the <a href="https://github.com/zefireio/framework" target="_blank">Zefire Framework</a> and all it's dependencies.</p>
            <p>At this stage you should be able to see the homepage.</p>
          </div>
          <div id="configuration" class="section-block">
            <h3 class="block-title">Configuration</h3>
            <p>After installing Zefire, you should configure your app's settings such as database connections, services, etc. All configuration files for the Zefire framework are stored in the <code>config</code> directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.</p>
            <p>The next thing you should do after installing Zefire is set your key to a random string with the following command:</p>
            <div class="code-block">
              <p><code>php console key</code></p>
            </div>
            <p>This key gets used for all encrypted data throught your application.</p>
            <p>Zefire uses a <code>.env</code> file for environmnent variables on a local development environment. This file should be at the root of your project. Here is an example file:</p>
            <div class="code-block">
              <h6>.env file example:</h6>
              <p><code>KEY=application_key</code></p>
              <p><code>HOST=app.local</code></p>
              <p><code>ENV=local</code></p>
              <p><code>DEBUG=true</code></p>
              <p><code>DB_HOST=127.0.0.1</code></p>
              <p><code>DB_PORT=3306</code></p>
              <p><code>DB_USERNAME=db_username</code></p>
              <p><code>DB_PASSWORD=db_password</code></p>
              <p><code>DB_DATABASE=application_database</code></p>
            </div>
            <p>This file should not be deployed on a live system, so don't forget to include it in your <code>.gitignore</code> file.</p>
          </div>
        </section>

        <section id="architecture" class="doc-section">
          <h2 class="section-title">Architecture</h2>
          <div id="mvc" class="section-block">
            <h3 class="block-title">MVC Implementation</h3>
            <p>Zefire implements the MVC Pattern which stands for Model-View-Controller. This pattern is used to separate application's concerns.</p>
            <h6>Model</h6>
            <p>Model represents an object carrying data. It can also have logic to update controller if its data changes.</p>
            <h6>View</h6>
            <p>View represents the visualization of the data that model contains.</p>
            <h6>Controller</h6>
            <p>Controller acts on both model and view. It controls the data flow into model object and updates the view whenever data changes. It keeps view and model separate.</p>
          </div>
          <div id="dependency-injection" class="section-block">
            <h3 class="block-title">Dependency Injection</h3>
            <p>Zefire implements a powerful design pattern known as Dependency Injection to manage class dependencies. Dependency injection essentially means that class dependencies are "injected" into another class via the constructor or when needed, directly in methods. These dependencies will be resolved and injected making them available in the created instance.</p>
            <h6>Dependency Injection via a constructor</h6>
            <div class="code-block">
              @code('php')
[php]

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    protected $repository;

    public function __construct(User $repository)
    {
        $this->repository = $repository;
    }

    public function show($id)
    {
        $user = $this->repository->find($id);

        return \View::render('user.profile', ['user' => $user]);
    }
}
              @endcode
            </div>
            <p>In this example, the UserController needs to retrieve users from a data source. So, we will inject a service that is able to retrieve users. In this context, our <code>User</code> model will be used to retrieve user information from the database. However, since the repository is injected, we are able to easily swap it out with another implementation.</p>
            <h6>Dependency Injection via a method</h6>
            <div class="code-block">
              @code('php')
[php]

namespace App\Http\Controllers;

use App\Models\User;

class UserController
{
    public function show(User $repository, $id)
    {
        $user = $repository->find($id);

        return \View::render('user.profile', ['user' => $user]);
    }
}
              @endcode
            </div>
            <p>In this example, the same feature was provided but not through the constructor. It was injected in the method like a method argument.</p>
            <h6>Service Container vs. Factory</h6>
            <p>Dependency resolution and injection can be provided either by the <code>Factory</code> component or the <code>Service</code> Container.</p>
            <p>Both components will have the ability to resolve, create and inject an instance through a class constructor or a class method. However, the <code>Service</code> container provides an additional feature.</p>
            <p>It will create a <code>singleton</code> (service) and store it in the container, always providing the same occurence of an instance pulled from the container as opposed to Factories which will create a "fresh" instance each time.</p>
            <p>Zefire loads all it's components as services and stores them in the container which is controlled by the <code>Zefire\Core\Application</code> service. You can check out the list of all these components in the <code>config/services.php</code> file.</p>
            <p>Of course you can setup your own services and reference them in this configuration file and they will be loaded by the framework's kernel.</p>
            <h6>Managing the container</h6>
            <p>It is also possible to manually manage these services as the <code>Application</code> component lets you interact with the container. You can add, update and remove service through code using the <code>make</code>, <code>bind</code> and <code>forget</code> methods:</p>
            <div class="code-block">
              @code('php')
// Add a service
\App::make('\App\CustomService', $CustomService);

// update a service
\App::bind('\App\CustomService', $CustomService);

// Remove a service
\App::forgetInstance('\App\CustomService');
              @endcode
            </div>            
          </div>
          <div id="aliases" class="section-block">
            <h3 class="block-title">Aliases</h3>
            <p>Zefire provides aliases for all of its components. Each of these aliases provide a <code>static</code> interface for your convenience. Here is a list of these aliases:</p>
            <table class="table table-bordered">
              <thead>
                <th>Alias</th><th>Component Class</th>
              </thead>
              <tbody>
                <tr><td><code>\App</code></td><td>\Zefire\Core\Application</td></tr>
                <tr><td><code>\Dumper</code></td><td>\Zefire\Dumper\Dumper</td></tr>
                <tr><td><code>\Factory</code></td><td>\Zefire\Factory\Factory</td></tr>
                <tr><td><code>\Log</code></td><td>\Zefire\Log\Log</td></tr>
                <tr><td><code>\Encryption</code></td><td>\Zefire\Encryption\Encryption</td></tr>
                <tr><td><code>\File</code></td><td>\Zefire\FileSystem\File</td></tr>
                <tr><td><code>\FileSystem</code></td><td>\Zefire\FileSystem\FileSystem</td></tr>
                <tr><td><code>\Queue</code></td><td>\Zefire\Queue\Queue</td></tr>
                <tr><td><code>\Dispatcher</code></td><td>\Zefire\Event\Dispatcher</td></tr>
                <tr><td><code>\Session</code></td><td>\Zefire\Session\Session</td></tr>
                <tr><td><code>\CookieBag</code></td><td>\Zefire\Http\CookieBag</td></tr>
                <tr><td><code>\HeaderBag</code></td><td>\Zefire\Http\HeaderBag</td></tr>
                <tr><td><code>\DB</code></td><td>\Zefire\Database\DB</td></tr>
                <tr><td><code>\Validator</code></td><td>\Zefire\Validation\Validator</td></tr>
                <tr><td><code>\Command</code></td><td>\Zefire\Routing\Command</td></tr>
                <tr><td><code>\Route</code></td><td>\Zefire\Routing\Route</td></tr>
                <tr><td><code>\Router</code></td><td>\Zefire\Routing\Router</td></tr>
                <tr><td><code>\Redirect</code></td><td>\Zefire\Redirect\Redirect</td></tr>
                <tr><td><code>\Cache</code></td><td>\Zefire\Cache\Cache</td></tr>
                <tr><td><code>\Translate</code></td><td>\Zefire\Translation\Translate</td></tr>
                <tr><td><code>\View</code></td><td>\Zefire\View\View</td></tr>
                <tr><td><code>\HttpException</code></td><td>\Zefire\Exception\HttpException</td></tr>
                <tr><td><code>\Auth</code></td><td>\Zefire\Authentication\Authentication</td></tr>
              </tbody>
            </table>
            <h6>Using an alias</h6>
            <p>All aliases are ment to be called <code>statically</code> as shown below:</p>
            <div class="code-block">
              @code('php')
\Alias::method();
              @endcode
            </div>
            <h6>Registering a custom alias</h6>
            <p>Once again, you are welcome to register your own aliases. To do so, you will have to create a class for your alias which extends the <code>Zefire\Alias\Alias</code> class and define the <code>serviceName</code> as shown below:</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Aliases;

use Zefire\Alias\Alias;

class MyService extends Alias
{
  /**
   * Defines the alias's name
   *
   * @return void
   */
    protected static function serviceName()
    {
        return 'App\\CustomService\\MyService';
    }
}
              @endcode
            </div>
            <p>Then, register your alias in the <code>config/services.php</code> in the "alias" section or register it manually using the <code>alias</code> method as shown below:</p>
            <div class="code-block">
              @code('php')
\App::alias('MyService', 'App\\CustomService\\MyService');
              @endcode
            </div>
          </div>          
        </section>

        <section id="basics" class="doc-section">
          <h2 class="section-title">The basics</h2>
          <div id="routing" class="section-block">
            <h3 class="block-title">Routing</h3>
            <p>The most basic Zefire routes accept a URI and a <code>\Closure</code>, providing a simple way of defining routes. All routes should be declared in the <code>routing/Routes.php</code> file.</p>
            <h6>Basic routes</h6>            
            <div class="code-block">
              @code('php')
\Route::get('/foo', function () {
  return 'Hello World';
}); 
              @endcode
            </div>
            <h6>Controller routes</h6>
            <p>Zefire allows you to declare more complex routes to instruct the framework to resolve to a specific method in a controller.</p>
            <div class="code-block">
              @code('php')
\Route::get('/foo/bar', 'Controller@method');
              @endcode
            </div>
            <p>Zefire's router allows you to register routes with the following <code>HTTP METHODS</code>:</p>
            <div class="code-block">
              @code('php')
\Route::get($uri, 'Controller@method');
\Route::post($uri, 'Controller@method');
\Route::put($uri, 'Controller@method');
\Route::patch($uri, 'Controller@method');
\Route::delete($uri, 'Controller@method');
              @endcode
            </div>
            <h6>View routes</h6>
            <p>If your route only needs to return a view, you may use a <code>\Closure</code> to render a view. The render method accepts a view (using dot notation) and some optional data if needed.</p>
            <div class="code-block">
              @code('php')    
\Route::get('/profile, function() {
  return \View::render('user.profile', ['firstname' => 'Paul', 'surname' => 'Smith']);
});
              @endcode
            </div>
            <h6>Redirect routes</h6>
            <p>If your route only needs to be redirected, you may use a <code>\Closure</code> as shown below.</p>
            <div class="code-block">
              @code('php')
\Route::get($uri, function() {
  return \Redirect::to('/foo/bar');
});
              @endcode
            </div>
            <h6>Route parameters</h6>
            <p>If you need to pass parameters through a <code>GET</code> route, then you may want to pass your parameters by defining a placeholder:</p>
            <div class="code-block">
              @code('php')
\Route::get('/user/{id}', function ($id) {
  return 'User ' . $id;
});

\Route::get('/user/{id}', 'UserController@getUser');
              @endcode
            </div>
            <h6>Route middlewares</h6>
            <p>If you need your route to go through a middleware, then you may specify it by using the use method. This method will accept a string as well as an array.</p>
            <div class="code-block">
              @code('php')
\Route::get('/your-route', 'Controller@method')->middleware('auth');
              @endcode
            </div>
          </div>
          <div id="middlewares" class="section-block">
            <h3 class="block-title">Middlewares</h3>
            <p>Middlewares are a convenient for filtering HTTP requests entering your application. For example, Zefire includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.</p>
            <p>Of course, additional middlewares can be written to perform a variety of tasks besides authentication.</p>
            <p>There are several middlewares included Zefire framework, such as authentication, CSRF protection and CORS adding the proper headers to all responses leaving your application.</p>
            <h6>Creating a middleware</h6>
            <p>To create a new middleware, you can use the following console command:</p>
            <p><code>php console middleware \\App\\Middlewares CheckAge</code></p>
            <p>This command will create a new CheckAge class within your <code>app/Middlewares</code> directory. In this middleware, we will only allow access to the route if the supplied age is greater than 21. Otherwise, we will redirect the users back to the home URI.</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Middlewares;

use Zefire\Http\Request;

class CheckAge
{
  public function handle(Request $request)
    {
        $inputs = $request->input();
        if ($input['age'] >= 21) {
            return redirect('/');
        }
    }  
}
              @endcode
            </div>
            <h6>Global middlewares</h6>
            <p>It is possible to force a middleware to be applied on every request as opposed to route based middlewares. This can be achieved by declaring your middleware class in the <code>config/services.php</code> configuration file.</p>
            <div class="code-block">
              @code('php')
'middlewares' => [
  'CheckAge' => App\Middlewares\CheckAge::class
],
              @endcode
            </div>
            <h6>Route middlewares</h6>
            <p>If you need your middleware to be applied to a specific route, then you may specify it by using the <code>middleware</code> method when declaring your route. This method will accept a pipe delimited <code>string</code> as well as an <code>array</code>.</p>
            <div class="code-block">
              @code('php')
\Route::get('/foo/bar', 'Controller@method')->middleware('auth');
              @endcode
            </div>
          </div>
          <div id="csrf" class="section-block">
            <h3 class="block-title">CSRF Protection</h3>
            <p>Zefire makes it easy to protect your application from cross-site request forgery (CSRF) attacks. Cross-site request forgeries are a type of malicious exploit where unauthorized commands are performed on behalf of an authenticated user.</p>
            <p>Zefire automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.</p>
            <h6>Excluding URIs From CSRF Protection</h6>
            <p>Sometimes you may wish to exclude a set of URIs from CSRF protection. For example, if you are using Stripe to process payments and are utilizing their webhook system, you will need to exclude your Stripe webhook handler route from CSRF protection since Stripe will not know what CSRF token to send to your routes.</p>
            <p>Typically, you should exclude the routes by adding their URIs to the <code>$exclusion</code> property of the <code>VerifyCsrfToken</code> middleware in the <code>app/Middlewares</code> directory.</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Middlewares;

use Zefire\Middlewares\CsrfToken;

class VerifyCsrfToken extends CsrfToken
{
  protected $exclusion = [
    '/foo/bar'
  ];
}
              @endcode
            </div>
            <h6>X-CSRF-TOKEN</h6>
            <p>The VerifyCsrfToken middleware will also check for the XSRF-TOKEN request header. You could, for example, store the token in a HTML meta tag:</p>
            <div class="code-block">
              @code('html')
<meta name="csrf-token" content="[openvar] \App::csrfToken() [closevar]">
              @endcode              
            </div>
            <p>Then, once you have created the meta tag, you can instruct a library like jQuery to automatically add the token to all request headers. This provides simple, convenient CSRF protection for your AJAX based applications:</p>
            <div class="code-block">
              @code('javascript')
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
              @endcode
            </div>
          </div>
          <div id="controllers" class="section-block">
            <h3 class="block-title">Controllers</h3>
            <p>Instead of defining all of your request handling logic as <code>\Closures</code> in route files, you may wish to organize this behavior using <code>Controller</code> classes. Controllers are stored in the <code>app/Controllers</code> directory.</p>
            <h6>Creating a controller</h6>
            <p>To create a new controller, you can use the following console command:</p>
            <p><code>php console controller \\App\\Controllers UserController</code></p>
            <p>This command will create a new UserController class within your <code>app\Controllers</code> directory. In this controller, we will retrieve a user's information:</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Controllers;

use App\Models\User;

class UserController
{
  public function getUser($id)
    {
        return User::boot()->find($id);
    }  
}
              @endcode
            </div>
            <p>You can define a route for this controller as shown below:</p>
            <div class="code-block">
              @code('php')
\Route::get('/user/{id}', 'UserController@getUser');
              @endcode
            </div>
          </div>
          <div id="request" class="section-block">
            <h3 class="block-title">Request</h3>
            <h6>Accessing the current request</h6>
            <p>To get an instance of the current <code>HTTP</code> request via dependency injection, you should type-hint the <code>Zefire\Http\Request</code> class on your controller method. The incoming request instance will automatically be injected by the app's container:</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Controllers;

use Zefire\Http\Request;

class UserController
{
  public function store(Request $request)
    {
        $inputs = $request->input();
    }  
}
              @endcode
            </div>
            <h6>Data request</h6>
            <ul class="list">
              <li>Headers</li>
              <li>server variables</li>
              <li>Request method</li>
              <li>Uri segments</li>
              <li>Inputs ($_GET, $_POST, etc.)</li>
              <li>File input</li>
              <li>IP address</li>
              <li>Port</li>
              <li>Is secure</li>
              <li>Is AJAX call</li>
              <li>Uri</li>
              <li>etc.</li>
            </ul>
            <p>Read API documentation for more details and a more comprehensive list of available methods.</p>
          </div>
          <div id="validation" class="section-block">
            <h3 class="block-title">Validation</h3>
            <p>Zefire provides an input validator to validate all your application's incomming data. Here is a list of validations rules available:</p>
            <ul class="list">
              <li><code>required</code>: checks that a field is not empty</li>
              <li><code>unique</code>: checks if the field's value already exists on a database table</li>
              <li><code>min</code>: checks if the field's length is at least "n" characters long</li>
              <li><code>max</code>: checks if the field's length dos not exceed "n" characters</li>
              <li><code>numeric</code>: checks if the field's value is numeric (integer or float)</li>
              <li><code>integer</code>: checks if the field's value is an integer</li>
              <li><code>email</code>: checks if the field's value is a valid email address</li>
            </ul>
            <p>Validation sould typically be used for <code>form</code> processing as shown below for the registration:</p>
            <div class="code-block">
              @code('php')
public function register(Request $request)
{
  $inputs = $request->input();
  $rules = [
    'email' => 'required|unique:user|email|max:255',
    'password' => 'min:6'
  ];
  \Validator::validate($rules, $inputs);
}
              @endcode
            </div>
            <h6>Check validation status</h6>
            <p>Zefire provides two methods to checks if validation passed or failed:</p>
            <div class="code-block">
              @code('php')
\Validator::passes();
// or
\Validator::fails();
              @endcode
            </div>
            <h6>Retrieve validation error messages</h6>
            <p>Zefire provides a methods to retieve validation error messages:</p>
            <div class="code-block">
              @code('php')
\Validator::messages();
              @endcode
            </div>
          </div>
          <div id="views" class="section-block">
            <h3 class="block-title">Views</h3>
            <p>Zefire's template system is simple, yet powerful and allows you to use plain PHP code in your views. All templates are compiled into plain PHP code and cached. Template view files use the <code>.php</code> file extension and are typically stored in the <code>resources/templates</code> directory.</p>
            <h6>Layouts</h6>
            <p>Two of the primary benefits of using Zefire's view system are template inheritance and sections. To get started, let's take a look at a simple example. First, we will examine a "master" page layout. Since most web applications maintain the same general layout across various pages, it's convenient to define this layout as a single view:</p>
            <div class="code-block">
              @code('html')
<html>
  <head>
    <title>App Name</title>
  </head>
  <body>
    [at]section('header')
       // Header section
    [at]endsection
    <div class="container">
      // Content
      [at]yield('content')
    </div>
  </body>
</html>
              @endcode
            </div>
            <p>As you can see, this file contains typical HTML mark-up. However, take note of the <code>@section</code> and <code>@yield</code> directives. The <code>@section</code> directive, as the name implies, defines a section of content, while the <code>@yield</code> directive is used to display the contents of a given partial.</p>
            <p>Now that we have defined a layout for our application, let's define a child page that inherits the layout.</p>
            <h6>Extending a layout</h6>
            <p>When defining a child view, use the <code>@extends</code> directive to specify which layout the child view should "inherit". Views which extend a layout may inject content into the layout's sections using <code>@section</code> directives. Remember, as seen in the example above, the contents of these sections will be displayed in the layout using <code>@yield</code>:</p>
            <div class="code-block">
              @code('html')
[at]extends('layout.master')

[at]section('content')
  <div>
     // Content section
  </div>
[at]endsection
              @endcode
            </div>
            <h6>Displaying data</h6>
            <p>Data may be passed to your view by passing an array when using the render method:</p>
            <div class="code-block">
              @code('php')
\View::render('user.user', ['name' => $name]);
              @endcode
            </div>
            <p>You would then access the data as below in the template:</p>
            <div class="code-block">
              @code('html')
<p>Hello [openvar] $data['name'] [closevar]</p>
              @endcode
            </div>
            <h6>If statements</h6>
            <p>You may construct if statements using the <code>[at]if</code>, <code>[at]elseif</code>, <code>[at]else</code>, and <code>[at]endif</code> directives. These directives work like PHP if statements:</p>
            <div class="code-block">
              @code('html')
[at]if (count($records) == 1)
  <p>Only one record</p>
[at]elseif (count($records) > 1)
  <p>Multiple records</p>
[at]else
  <p>No records</p>
[at]endif
              @endcode
            </div>
            <h6>Foreach loops</h6>
            <p>You may construct a foreach loop using the <code>[at]foreach</code> directive which works just like a PHP foreach loop:</p>
            <div class="code-block">
              @code('html')
[at]foreach ($data as $key => $value)
  <p>[openvar] $value [closevar]</p>
[at]endforeach
              @endcode
            </div>
            <h6>For loops</h6>
            <p>You may construct a for loop using the <code>[at]for</code> directive which works just like a PHP for loop:</p>
            <div class="code-block">
              @code('html')
[at]for ($i = 0; $i < 10; $i++)
  <p>[openvar] $i [closevar]</p>
[at]endfor
              @endcode              
            </div>
            <h6>While loops</h6>
            <p>You may construct a while loop using the <code>[at]while</code> directive which works just like a PHP while loop:</p>
            <div class="code-block">
              @code('html')
[at]while ($count < 100)
  <p>[openvar] $count [closevar]</p>
  [at]php
    $count++
  [at]endphp
[at]endwhile
              @endcode              
            </div>
            <h6>Embeded PHP</h6>
            <p>In some situations, it's useful to embed PHP code into your views. You can use the <code>[at]php</code> directive to execute a block of plain PHP within your template:</p>
            <div class="code-block">
              @code('html')
[at]php
  // embeded PHP code
[at]endphp
              @endcode
            </div>
            <h6>Variables</h6>
            <p>To display a variable's value, just encapsulate your PHP variable as shown below:</p>
            <div class="code-block">
              @code('html')
[openvar] $var [closevar] // escaped variable
[openrawvar] $var [closerawvar] // unescaped variable
              @endcode
            </div>
            <h6>Sections</h6>
            <p>You may use the <code>[at]section</code> directive to insert a section:</p>
            <div class="code-block">
              @code('html')
[at]section('content')
  <div>
     // This would hold your section
  </div>
[at]endsection
              @endcode              
            </div>
            <h6>Translations</h6>
            <p>You may use the <code>&commat;translate</code> directive to access pre defined translations located in the <code>resources/lang</code> directory:</p>
            <div class="code-block">
              @code('html')
[at]translate('en.app.buy')
              @endcode              
            </div>
          </div>
          <div id="session" class="section-block">
            <h3 class="block-title">Session</h3>
            <p>Since HTTP driven applications are stateless, sessions provide a way to store information about the user across multiple requests. Zefire comes with 2 backend handlers (file and memcached).</p>
            <h6>Configuration</h6>
            <p>The session configuration file is stored at <code>config/session.php</code>. By default, zefire is configured to use the file session driver, which will work well for many applications. In production applications, you may consider using the memcached driver for faster session performance but also to share sessions accross server instances.</p>
            <p>The session instance is available through standard depedency injection or through its alias as shown below:</p>
            <h6>Retrieving data</h6>
            <div class="code-block">
              @code('php')
\Session::get('key');
              @endcode
            </div>
            <h6>Retrieving all data</h6>
            <div class="code-block">
              @code('php')
\Session::all();
              @endcode
            </div>
            <h6>Check if data exists</h6>
            <div class="code-block">
              @code('php')
\Session::exists('key');
              @endcode
            </div>
            <h6>Storing data</h6>
            <div class="code-block">
              @code('php')
\Session::set('key', 'value');
              @endcode
            </div>
            <h6>Deleting data</h6>
            <div class="code-block">
              @code('php')
\Session::forget('key');
              @endcode
            </div>
            <h6>Flushing data</h6>
            <div class="code-block">
              @code('php')
\Session::flush();
              @endcode
            </div>
            <h6>Implementing a custom handler</h6>
            <p>You can create a custom session handler to extend Zefire's session abilities. Your custom session handler just needs is to implement the <code>SessionHandlerInterface</code>. This interface contains just a few simple methods we need to implement as shown below:</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Extensions;

class CustomSessionHandler implements \SessionHandlerInterface
{
    public function open($savePath, $sessionName)
    {
        //
    }
    public function close()
    {
        //
    }
    public function read($sessionId)
    {
        //
    }
    public function write($sessionId, $data)
    {
        //
    }
    public function destroy($sessionId)
    {
        //
    }
    public function gc($lifetime)
    {
        //
    }
}
              @endcode
            </div>
            <p>Since the purpose of these methods is not readily understandable, let's quickly cover what each of the methods do:</p>
            <ul class="list">
              <li>The open method would typically be used in file based session store systems. Since Zefire comes with a file session driver, you will almost never need to put anything in this method. You can leave it as an empty stub.</li>
              <li>The close method, like the open method, can also usually be disregarded. For most drivers, it is not needed.</li>
              <li>The read method should return the string version of the session data associated with the given <code>$sessionId</code>.</li>
              <li>The write method should write the given <code>$data</code> string associated with the <code>$sessionId</code> to some persistent storage system, such as MongoDB, Dynamo, etc.</li>
              <li>The destroy method should remove the data associated with the <code>$sessionId</code> from persistent storage.</li>
              <li>The gc method should destroy all session data that is older than the given <code>$lifetime</code>, which is a UNIX timestamp.</li>
            </ul>
            <h6>Registering your custom handler</h6>
            <p>Just define your custom session handler in the session configuration file stored at <code>config/session.php</code> as shown below:</p>
            <div class="code-block">
              @code('php')
'driver' => App\Extensions\Session\CustomSessionHandler::class,
              @endcode
            </div>
          </div>
          <div id="logging" class="section-block">
            <h3 class="block-title">Logging</h3>
            <p>All the logs are available in the <code>storage/logs</code> directory. Three different log levels are available:</p>
            <ul>
              <li><code>error.log</code> storing all errors.</li>
              <li><code>db.log</code> storing database events.</li>
              <li><code>app.log</code> storing all application events.</li>
            </ul>
            <p>You can log an event manually at any time by using the <code>push</code> method as shown below:</p>
            <div class="code-block">
              @code('php')
\Log::push('Created a user.', 'app');
              @endcode
            </div>
          </div>
        </section>

        <section id="database" class="doc-section">
          <h2 class="section-title">Database</h2>
          <div id="db-introduction" class="section-block">
            <h3 class="block-title">Introduction</h3>
            <p>Zefire makes interacting with databases as easy as possible using either raw SQL, the query builder or the Object Relational Mapper (ORM). Currently, Zefire supports three databases:</p>
            <ul class="list">
              <li>MySQL</li>
              <li>PostgreSQL</li>
              <li>SQLite</li>
            </ul>
            <p>Zefire's database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your application and works on all supported database systems.</p>
            <p>The query builder uses PDO parameter binding to protect your application against SQL injection attacks. There is no need to clean strings being passed as bindings.</p>
          </div>
          <div id="db-configuration" class="section-block">
            <h3 class="block-title">Configuration</h3>
            <p>The database configuration for your application is located at <code>config/database.php</code>. In this file you may define all of your database connections, as well as specify which connection should be used by default.</p>
            <p>You should not use the confuration file to setup your database connections directly. Use it to read from environment variables for security reasons. You can use the <code>.env</code> file as shown below for a development environment or set your environment variables on your server for live stacks:</p>
            <div class="code-block">
              <h6>.env file example:</h6>
              <p><code>DB_HOST=127.0.0.1</code></p>
              <p><code>DB_PORT=3306</code></p>
              <p><code>DB_USERNAME=db_username</code></p>
              <p><code>DB_PASSWORD=db_password</code></p>
              <p><code>DB_DATABASE=application_database</code></p>
            </div>
            <p>Then configure your <code>config/database.php</code> to match your environment file as shown below :</p>
            <div class="code-block">
              @code('php')
'mysql1' => [
  'type'     => 'mysql',
  'adapter'  => \Zefire\Databse\MysqlAdapter::class,
  'host'     => getenv('DB_HOST'),
  'port'     => getenv('DB_PORT'),
  'username' => getenv('DB_USERNAME'),
  'password' => getenv('DB_PASSWORD'),
  'database' => getenv('DB_DATABASE')
],
              @endcode
            </div>
            <p>You can add as many connections as your application requires.</p>
          </div>
          <div id="all" class="section-block">
            <h3 class="block-title">Retrieving all rows from a table</h3>
            <p>You may use the <code>connection</code> method with the <code>\DB</code> alias to begin a query. The <code>connection</code> method initializes a <code>\PDO</code> connection for you. It only requires the connection name previuosly configured in your <code>config/database.php</code> file. The <code>table</code> method sets the table, allowing you to chain more constraints onto the query and then finally get the results using the <code>get</code> method:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')->table('user')->get();
              @endcode
            </div>
            <p>The <code>get</code> method returns an <code>array</code> containing the results where each result is an instance of the PHP <code>\StdClass</code> object. You may access each column's value by accessing the column as a property of the object:</p>
            <div class="code-block">
              @code('php')
foreach ($users as $user) {
  echo $user->email;
}
              @endcode
            </div>
          </div>
          <div id="single" class="section-block">
            <h3 class="block-title">Retrieving a single row from a table</h3>
            <p>If you just need to retrieve a single row from the database table, you may use the <code>first</code> method or the <code>find</code> method. The <code>find</code> method gets a single record based on the primary key (usually the ID) where as the <code>first</code> method would commonly be combined with a <code>where</code>clause. These methods will return a single <code>\StdClass</code> object:</p>
            <div class="code-block">
              @code('php')
$user = \DB::connection('mysql1')
  ->table('user')
  ->find(1); //find by primary key

$user = \DB::connection('mysql1')
  ->table('user')
  ->where('email', '=', 'paul.smith@example.com')
  ->first();
              @endcode
            </div>
          </div>
          <div id="select" class="section-block">
            <h3 class="block-title">Select</h3>
            <p>Of course, you may not always want to select all columns from a database table. Using the <code>select</code> method, you can specify a custom select clause for the query:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')->table('user')->select(['email'])->get();
              @endcode
            </div>
            <p>The <code>distinct</code> method allows you to force the query to return distinct results:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')->table('user')->distinct(['email'])->get();
              @endcode
            </div>
          </div>
          <div id="join" class="section-block">
            <h3 class="block-title">Join</h3>
            <p>The query builder may also be used to write join statements. To perform a join, you may use the <code>join</code> method. The first argument passed to the <code>join</code> method is the name of the table you are using and the second argument is the table you need to join to, while the remaining arguments specify the column constraints for the join except for the last argument specifying the join type which defaults to a <code>left</code> join.</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->join('user', 'group', 'id', 'user_id', 'left')
  ->get();
              @endcode
            </div>
          </div>
          <div id="where" class="section-block">
            <h3 class="block-title">Where</h3>
            <p>You may use the <code>where</code> method to add where clauses to the query. The most basic call to where requires three arguments. The first argument is the name of the column. The second argument is an operator, which can be any of the database's supported operators. Finally, the third argument is the value to evaluate against the column.</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')->table('user')->where('age', '>=', 21)->get();
              @endcode
            </div>
            <p>Of course, you may use a variety of other operators when writing a where clause:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')->table('user')->where('age', '=', 21)->get();
$users = \DB::connection('mysql1')->table('user')->where('age', '<', 21)->get();
$users = \DB::connection('mysql1')->table('user')->where('email', 'like', '%@example.com')->get();
              @endcode
            </div>
          </div>
          <div id="whereor" class="section-block">
            <h3 class="block-title">Where or</h3>
            <p>You may chain where constraints together as well as add or clauses to the query. The <code>whereOr</code> method accepts the same arguments as the <code>where</code> method:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->where('age', '=', 21)
  ->whereOr('email', 'like', '%@example.com')
  ->get();
              @endcode
            </div>
          </div>
          <div id="between" class="section-block">
            <h3 class="block-title">Between</h3>
            <p>The <code>between</code> method verifies that a column's value is between two values:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->between('age', [18, 21])
  ->get();
              @endcode
            </div>
          </div>
          <div id="wherein" class="section-block">
            <h3 class="block-title">Where In</h3>
            <p>The <code>whereIn</code> method verifies that a given column's value is contained within the given array:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->whereIn('id', [1, 2, 3])
  ->get();
              @endcode
            </div>
          </div>
          <div id="wherenotin" class="section-block">
            <h3 class="block-title">Where Not In</h3>
            <p>The <code>whereNotIn</code> method verifies that a given column's value is <strong>not</strong> contained within the given array:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->whereNotIn('id', [1, 2, 3])
  ->get();
              @endcode
            </div>
          </div>
          <div id="orderby" class="section-block">
            <h3 class="block-title">Order By</h3>
            <p>The <code>orderBy</code> method allows you to sort the result of the query by a given column. The first argument to the orderBy method should be the column you wish to sort by, while the second argument controls the direction of the sort and may be either <code>asc</code> or <code>desc</code>:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->orderBy('created_at', 'desc')
  ->get();
              @endcode
            </div>
          </div>
          <div id="groupby" class="section-block">
            <h3 class="block-title">Group By and Having</h3>
            <p>The <code>groupBy</code> and <code>having</code> methods may be used to group the query results. The <code>having</code> method's signature is similar to the <code>where</code> method:</p>
            <div class="code-block">
              @code('php')
$users = \DB::connection('mysql1')
  ->table('user')
  ->groupBy('email')
  ->having('age', '>', 21)
  ->get();
              @endcode
            </div>
          </div>
          <div id="insert" class="section-block">
            <h3 class="block-title">Insert</h3>
            <p>The query builder also provides an <code>insert</code> method for inserting records into the database table. The <code>insert</code> method accepts an array of column names and values:</p>
            <div class="code-block">
              @code('php')
\DB::connection('mysql1')
  ->table('user')
  ->insert(['email' => 'paul.smith@example.com']);
              @endcode
            </div>
          </div>
          <div id="update" class="section-block">
            <h3 class="block-title">Update</h3>
            <p>Of course, in addition to inserting records into the database, the query builder can also update existing records using the <code>update</code> method. The <code>update</code> method, like the <code>insert</code> method, accepts an array of column and value pairs containing the columns to be updated. You may constrain the update query using <code>where</code> clauses:</p>
            <div class="code-block">
              @code('php')
\DB::connection('mysql1')
  ->table('users')
  ->where('id', 1)
  ->update(['email' => 'paul.smith@example.com']);
              @endcode
            </div>
          </div>
          <div id="delete" class="section-block">
            <h3 class="block-title">Delete</h3>
            <p>The query builder may also be used to delete records from the table via the <code>delete</code> method. By default, Zefire soft deletes records, therefore they remain on the table but the <code>deleted_at</code> column gets populated and those records will be ignored on future queries unless you require the <code>trashed</code> records to be included. It is possible to force the deletion using the <code>forceDelete</code> method. You also may constrain delete statements by adding where clauses before calling the <code>delete</code> or <code>forceDelete</code> methods:</p>
            <div class="code-block">
              @code('php')
\DB::connection('mysql1')->table('user')->where('email', '=', 'paul.smith@example.com')->delete(); // soft delete
\DB::connection('mysql1')->table('user')->where('email', '=', 'paul.smith@example.com')->forceDelete(); // delete
              @endcode
            </div>
          </div>
          <div id="restore" class="section-block">
            <h3 class="block-title">Restore</h3>
            <p>The query builder may also be used to restore deleted records from the table via the <code>restore</code> method. Of course you have to grab the soft deleted records using the <code>withTrashed</code> method:</p>
            <div class="code-block">
              @code('php')
// get the trashed record
$user = \DB::connection('mysql1')
  ->table('user')
  ->withTrashed()
  ->where('email', '=', 'paul.smith@example.com')
  ->first();

// and restore it
\DB::connection('mysql1')->table('user')->find($user->id)->restore();
              @endcode
            </div>
          </div>
          <div id="raw" class="section-block">
            <h3 class="block-title">Raw Queries</h3>
            <p>Sometimes you may need to use raw queries. To create a query, you may use the <code>raw</code> method. This will expect two arguments, the first one should be your SQL statement and the second one, your bindings:</p>
            <div class="code-block">
              @code('php')
$user = \DB::connection('mysql1')->raw('SELECT * FROM `user` WHERE `email` = :email', ['email' => 'paul.smith@example.com']);
              @endcode
            </div>
          </div>
          </section>

          <section id="orm" class="doc-section">
          <h2 class="section-title">ORM</h2>
          <div id="orm-introduction" class="section-block">
            <h3 class="block-title">Introduction</h3>
            <p>Zefire's ORM implements the ActiveRecord pattern to work with your database. Each database table should have a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as inserting or saving records.</p>
            <p>Before you get started, be sure to configure a database connection in the <code>config/database.php</code> file. For more information on configuring your database, check out the <a href="/documentation#database">database</a> section of this documentation.</p>
          </div>
          <div id="models" class="section-block">
            <h3 class="block-title">Models</h3>
            <h6>Defining models</h6>
            <p>Models typically live in the <code>app/models</code> directory, but you are free to place them anywhere that can be auto-loaded according to your <code>composer.json</code> file. All models extend <code>Zefire\Database\Model</code> class.</p>
            <p>The easiest way to create a model instance is using the model console command and specifying the namespace, the model's name, the table's name and the connection to use as shown below:</p>
            <p><code>php console model \\App\\Models User user mysql1</code></p>
            <p>This will create a "User" model in the <code>app/Models</code> directory which will look like this:</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Models;

use Zefire\Database\Model;

class User extends Model
{
    protected $connection = 'mysql1';

    protected $table = 'user';

    protected $model = '\App\Models\User';

    public static function boot()
    {
        $model = get_class();
        return new $model();
    }
}
              @endcode
            </div>
            <p>You may have noticed that the generated model comes with a public static <code>boot</code> method. This will allow you to create an instance of your model from which you can then chain from. Of course the traditional instance creation is also perfectly usable:</p>
            <div class="code-block">
              @code('php')
use App\Model\User;

// Using boot static method
$users = User::boot()->get();

// Using standard instance creation
$model = new User();
$users = $model->get();
              @endcode
            </div>
            <h6>Querying a model</h6>
            <p>Of course, you can query your model as you would do with the <code>\DB</code> alias, however, with models you do not have to specify the table and connection as they are already defined. All query clauses from the database instance are also available to models. Check out the <a href="/documentation#database">database</a> section of this documentation to see what clauses are available.</p>
            <div class="code-block">
              @code('php')
use App\Model\User;

$user = User::boot()->where('email', '=', 'paul.smith@example.com')->first();
              @endcode
            </div>
            <p>When querying a model, Zefire's ORM will keep the recordset active so you can modify it to suit your need. If the query returned a single record, then all attributes will be available in the model's <code>attributes</code> property and they would be accessible as shown below:</p>
            <div class="code-block">
              @code('php')
use App\Model\User;

$user = User::boot()->find(1);
$user->email = 'paul.smith@example.com';
$user->save();
              @endcode
            </div>
            <p>If multiple records where returned, then you would still have the same abilty to interact with the records, however they would not be stored in the <code>attributes</code> property. Instead, you would get an instance of <code>Zefire\Database\Collection</code> which will have a collection (array) of models for each record allowing you to loop through them and interact with them at any time.</p>
            <div class="code-block">
              @code('php')
use App\Model\User;

$users = User::boot()->get();
foreach ($users->items as $user) {
  $user->voted = true;
  $user->save();
}
              @endcode
            </div>
          </div>
          <div id="relations" class="section-block">
            <h3 class="block-title">Relations</h3>
            <p>Database tables are often related to one another. For example, a user may have many roles, or an order could be related to the user who placed it. Zefire makes managing and working with these relationships easy, and supports several different types of relationships:</p>
            <h6>Defining Relationships</h6>
            <p>Zefire's ORM relationships are defined as methods on your model classes:</p>
            <div class="code-block">
              @code('php')
[php]

namespace App\Models;

use Zefire\Database\Model;

class User extends Model
{
    protected $connection = 'mysql1';

    protected $table = 'user';

    protected $model = '\App\Models\User';

    public static function boot()
    {
        $model = get_class();
        return new $model();
    }

    public function phone()
    {
        return $this->hasOne('App\Models\phone', 'user_id');
    }
}
              @endcode
            </div>
            <h6>One to one</h6>
            <p>A one-to-one relationship is a very basic relation. For example, a user might be associated with to a phone number. To define this relationship, we place a <code>phone</code> method on the <code>User</code> model. The <code>phone</code> method should call the <code>hasOne</code> method with a class name and a <code>foreign key</code> to return the relationship:</p>
            <div class="code-block">
              @code('php')
public function phone()
{
    return $this->hasOne('App\Models\Phone', 'user_id');
}
              @endcode
            </div>
            <h6>One to many</h6>
            <p>A "one-to-many" relationship is used to define relationships where a single model owns any amount of other models. For example, a user may have multiple addresses. Like all other relationships, one-to-many relationships are defined by placing a function on your model which will call the <code>hasMany</code> method expecting a class name and a <code>foreign key</code>:</p>
            <div class="code-block">
              @code('php')
public function addresses()
{
    return $this->hasMany('App\Models\Address', 'user_id');
}
              @endcode
            </div>
            <h6>Many to many</h6>
            <p>Many-to-many relations are slightly more complicated than <code>hasOne</code> and <code>hasMany</code> relationships. An example of such a relationship is a user with many roles, where the roles are also shared by other users. For example, many users may have the role of "Admin". To define this relationship, three database tables are needed: <code>user</code>, <code>role</code>, and <code>user_role</code>. The <code>user_role</code> table contains the <code>user_id</code> and <code>role_id</code> columns and acts as a pivot table.</p>
            <p>Many-to-many relationships are defined by writing a method that returns the result of the <code>manyToMany</code> method. For example, let's define the roles method on our User model:</p>
            <div class="code-block">
              @code('php')
public function roles()
{
    return $this->hasMany('\App\Models\Role', '\App\Models\UserRole', 'user_id', 'group_id');
}
              @endcode
            </div>
            <h6>Querying models with relations</h6>
            <p>Once you have defined all your relationships in your models, you will need to retrieve them when you query your model. This is performed through "eager loading" using the <code>with</code> method as shown below:</p>
            <div class="code-block">
              @code('php')
$user = User::boot()->with(['phone', 'addresses', 'roles'])->find(1);
              @endcode
            </div>
            <p>All relations are accessible from the <code>relations</code> property on the model. In case of a many-to-many relationship, you will also get a <code>pivot</code> property holding the pivot table which you can also query and update to match any updates on the relation.</p>            
          </div>
          <div id="orm-create" class="section-block">
            <h3 class="block-title">Create</h3>
            <p>You may use the <code>create</code> method, which accepts an array of attributes to insert a record into the database:</p>
            <div class="code-block">
              @code('php')
Role::boot()->create([
    'name' => 'Admin',
    'description' => 'Administrator'
])
              @endcode
            </div>
          </div>
          <div id="orm-save" class="section-block">
            <h3 class="block-title">Save</h3>
            <p>You may use the <code>save</code> method to update a record on the database:</p>
            <div class="code-block">
              @code('php')
$user = User::boot()->find(1);
$user->email = 'paul.smith@example.com';
$user->save();
              @endcode
            </div>
          </div>
          <div id="orm-delete" class="section-block">
            <h3 class="block-title">Delete</h3>
            <p>You may use the <code>delete</code> method to soft delete a record on the database. Soft deleting will not delete the record. It will only populate the <code>deleted_at</code> column on the record and then would be ignored on future queries. To force delete a record, you have to use the <code>forceDelete</code> method.</p>
            <div class="code-block">
              @code('php')
// Soft delete a record
$user = User::boot()->find(1);
$user->delete();

// Force delete a record
$user = User::boot()->find(1);
$user->forceDelete();
              @endcode
            </div>
          </div>
          <div id="orm-restore" class="section-block">
            <h3 class="block-title">Restore</h3>
            <p>You may use the <code>restore</code> method to reactivate a soft deleted record. In order to do this, you need to get the <code>trashed</code> record and use the <code>restore</code> method to reactivate it.</p>
            <div class="code-block">
              @code('php')
// get the trashed record
$user = User::boot()
  ->withTrashed()
  ->where('email', '=', 'paul.smith@example.com')
  ->first();

// and restore it
User::boot()->find($user->id)->restore();
              @endcode
            </div>
          </div>
        </section>

        <section id="security" class="doc-section">
          <h2 class="section-title">Security</h2>
          <div id="authentication" class="section-block">
            <h3 class="block-title">Authentication</h3>
            <p>Zefire makes implementing authentication very simple. In fact, almost everything is configured for you out of the box. The authentication configuration file is located at <code>config/auth.php</code>, where you'll have to define the model in charge of providing user records. By default, Zefire will use the <code>App\Models\User</code> model to provide access to users.</p>
            <p>To use the built-in authentication system, the best way to get started is to use the following console command to generate the controllers and views:</p>
            <p><code>php console auth</code></p>
            <p>Controllers will be found in the <code>app/Controllers/Auth</code> directory and the views in the <code>resources/templates/auth</code> directory.</p>
            <p>Then you'd need to create your database and a <code>user</code> table as well as a <code>User</code> Model which you can define by following instructions found in the <a href="/documentation#models">model</a> section of this documentation. To create a <code>user</code> table, run the following query in favorite SQL client:</p>
            <div class="code-block">
              @code('sql')
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
              @endcode
            </div>
            <p>Don't forget to setup your routes as shown below:</p>
            <div class="code-block">
              @code('php')
// Authentication Routes
\Route::get('/auth/login', 'Auth\Authenticate@getLoginForm');
\Route::post('/auth/login', 'Auth\Authenticate@login');
\Route::get('/auth/logout', 'Auth\Authenticate@logout');
// Registration Routes
\Route::get('/auth/register', 'Auth\Register@getRegistrationForm');
\Route::post('/auth/register', 'Auth\Register@register');
              @endcode
            </div>
            <p>Once Authentication is all set up, you will be able to login, logout users using sessions, as well as registering them. You should also be able to use the <code>\Auth</code> alias wich provides a <code>status</code> method checking if a user is logged in. A <code>user</code> method is also available and will retrieve all information about the logged user as a ORM model from session.</p>
          </div>
          <div id="api-authentication" class="section-block">
            <h3 class="block-title">API Authentication</h3>
            <p>APIs typically use tokens to authenticate users and do not maintain session state between requests. Zefire makes API authentication really easy as it comes with a built-in API token authentication wich uses the <code>api_token</code> column from the <code>user</code> table and <code>User</code> model.</p>
            <p>You can generate API tokens using the following console command:</p>
            <p><code>php console token</code></p>
          </div>
          <div id="authorization" class="section-block">
            <h3 class="block-title">Authorization</h3>
            <p>In addition to providing <a href="/documentation#authentication">authentication</a> services out of the box, Zefire also provides a simple way to authorize user actions against a given resource. Like authentication, Zefire's approach to authorization is simple as it uses middlewares assigned to routes:</p>
            <div class="code-block">
              @code('php')
// Http Routes
\Route::get('/admin/dashboard', 'DashboardController@index')->middleware('Authorise');

// Api Routes
\Route::get('/api/get/resource', 'ApiController@getResource')->middleware('ApiAuthorise');
              @endcode
            </div>
            <p>For API calls, the <code>Authorization: Bearer</code> request header is required.</p>
            <div class="code-block">
              @code('http')
Authorization: Bearer <token>
              @endcode
          </div>
          <div id="encryption" class="section-block">
            <h3 class="block-title">Encryption</h3>
            <p>Zefire's encrypter uses OpenSSL to provide AES-128-CBC and AES-256-CBC cyphered encryption. Since the encryption uses the "App key", it is strongly recommended you generate that key as soon as possible as explained in the <a href="/documentation#configuration">configuration</a> section of the <a href="/documentation#getting-started">Getting Started</a> section.</p>
            <p>As expected, the encryption module handle encryption and decryption of data and therefore comes two methods to perform these tasks. As every module is Zefire, encryption also comes with an alias:</p>
            <div class="code-block">
              @code('php')
// Encrypt
\Encryption::encrypt('raw_data');

// Decrypt
\Encryption::decrypt('encrypted_data');
              @endcode
          </div>
          </div>
          <div id="hashing" class="section-block">
            <h3 class="block-title">Hashing</h3>
            <p>Zefire provides a hashing module for storing user passwords and any other data that should be hashed. If you are using the built-in <code>LoginController</code> and <code>RegisterController</code> classes that are included with your Zefire application, they will use the <code>Zefire\Hashing\Hasher</code> component.</p>
            <p>The <code>\Hasher</code> provides two hashing methods, one box standard and a salted one as shown below:</p>
            <div class="code-block">
              @code('php')
// Normal hash
\Hasher::make('raw_data');

// Salted hash
\Hasher::makeSalted('raw_data');
              @endcode
          </div>
          </div>
        </section>

        <section id="advanced" class="doc-section">
          <h2 class="section-title">Advanced</h2>
          <div id="console" class="section-block">
            <h3 class="block-title">Console</h3>
            <p>Zefire provides a console access to your app with built-in commands.</p>
            <p>Here is a list of built-in commands:</p>
            <ul class="list">
              <li><code>php console clear-compiled</code>: clears all compiled views</li>
              <li><code>php console clear-sessions</code>: clears all sessions files</li>
              <li><code>php console clear-logs</code>: clears all log files (error.log, db.log and app.log)</li>
              <li><code>php console work {queue_name}</code>: starts a given queue worker</li>
              <li><code>php console clear-queue {queue_name}</code>: clears all jobs on a given queue</li>
              <li><code>php console down</code>: puts your application into maintenance mode</li>
              <li><code>php console up</code>: put your application back online</li>
              <li><code>php console controller {namespace} {controller}</code>: generates a fresh controller class</li>
              <li><code>php console middleware {namespace} {middleware}</code>: generates a fresh middleware class</li>
              <li><code>php console job {namespace} {job}</code>: generates a fresh job class</li>
              <li><code>php console event {namespace} {event}</code>: generates a fresh event class</li>
              <li><code>php console model {namespace} {model} {table} {connection}</code>: generates a fresh model class</li>
              <li><code>php console auth</code>: generates authentication controllers and views</li>
              <li><code>php console command {command} {namespace} {controller}</code>: generates a fresh command class</li>
              <li><code>php console list-routes {type}</code>: lists all web or api routes</li>
              <li><code>php console key</code>: generates an "app key"</li>
              <li><code>php console token</code>: generates an API Token</li>
            </ul>
            <p>Zefire also give your the ability to create your own console commands.</p>
            <h6>Creating a command</h6>
            <p>First you need to create a command controller using the following console command:</p>
            <p><code>php console command my-command \\App\\Commands MyCommand</code></p>
            <p>This will generate the following command controller in the <code>app/Commands</code> directory</p>
            <div class="code-block">
              @code('php')
[php]

namespace \App\Commands;

class MyCommand
{
  public function myCommand()
  {
    //
  }
}
              @endcode
            </div>
            <p>Once you have written your command's logic then all you have to do is register your new command in the <code>routing/Commands.php</code> file as shown below:</p>
            <div class="code-block">
              @code('php')
\Command::name('my-command', 'App\Commands\MyController@myMethod');
              @endcode
            </div>
          </div>
          <div id="cache" class="section-block">
            <h3 class="block-title">Cache</h3>
            <p>Zefire provides a unified API for caching. The cache configuration is located at <code>config/cache.php</code>. In this file you may specify which cache driver you would like to be used by default throughout your application.</p>
            <p>Zefire supports Memcached out of the box. However, you are more than welcome to write your own driver as all you need is to implements the <code>Zefire\Contracts\Storable</code> interface which is self-explanatory.</p>
            <div class="code-block">
              @code('php')
public function set($key, $value, $ttl = 0);
public function exists($key);
public function get($key);
public function forget($key);
public function flush();
public function all();
              @endcode
            </div>
            <h6>Retrieving data</h6>
            <div class="code-block">
              @code('php')
\Cache::get('key');
              @endcode
            </div>
            <h6>Retrieving all data</h6>
            <div class="code-block">
              @code('php')
\Cache::all();
              @endcode
            </div>
            <h6>Check if data exists</h6>
            <div class="code-block">
              @code('php')
\Cache::exists('key');
              @endcode
            </div>
            <h6>Storing data</h6>
            <div class="code-block">
              @code('php')
\Cache::set('key', 'value');
              @endcode
            </div>
            <h6>Deleting data</h6>
            <div class="code-block">
              @code('php')
\Cache::forget('key');
              @endcode
            </div>
            <h6>Flushing data</h6>
            <div class="code-block">
              @code('php')
\Cache::flush();
              @endcode
            </div>
          </div>
          <div id="queues" class="section-block">
            <h3 class="block-title">Queues</h3>
            <p>Zefire queues provide a unified API for queues. Queues allow you to defer the processing of a time consuming task, such as sending an email, as a background taks. Deferring these time consuming tasks drastically speeds up web requests to your application.</p>
            <p>The queue configuration file is stored in <code>config/queue.php</code>. Zefire comes with Beanstalkd support out of the box. However, like many back-end components in Zefire, you can create your own driver using Redis, Amazon SQS or even using a database.</p>
            <h6>Creating a job</h6>
            <p>Job classes are very simple, normally containing only a handle method which is called when the job is processed by the queue. To get started, let's take a look at an example job class where an email would be sent to a customer after an order was placed:</p>
            <div class="code-block">
              @code('php')
[php]

namespace \App\Jobs;

use Zefire\Contracts\Handleable;
use App\Models\User;
use App\Emailer;

class EmailCustomer implements Handleable
{
  public function handle(Emailer $emailer, $address)
  {
    $user = User::boot()->where('email', '=', $address)->first();
    $content = '<p>Hello ' . $user->name . ' and thank you for shopping with us.</p>';
    $content .= '<p>Please follow the link below to review your order details:</p>';
    $content .= '<a href="#">my account</a>';    
    $emailer->send($user->name, $user->email, $content);
  }
}
              @endcode
            </div>
            <h6>Pushing a job on a queue</h6>
            <p>Once your job was created, you may push it on the queue using the <code>push</code> or <code>later</code> methods:</p>
            <div class="code-block">
              @code('php')
// Push
\Queue::push('\\App\\Jobs\\EmailCustomer', ['email' => 'paul.smith@example.com'], 'email');

// Push but execute in an hour
\Queue::later('\\App\\Jobs\\EmailCustomer', 3600, ['email' => 'paul.smith@example.com'], 'email');
              @endcode
            </div>
            <p>Of course to get the queueing system to work and process jobs, you may start a worker for your queue. Workers are started through command line using the following command:</p>
            <p><code>php console work email</code></p>
            <p>The worker will listen for new jobs released on the queue and process them. You could use <a href="http://supervisord.org/" target="_blank">supervisor</a> to manage your workers.</p>
            <h6>Flush a queue</h6>
            <p>Sometimes, you will find yourself in a situation where you will need to clear all job on a queue. To do so, just run the following console command:</p>
            <p><code>php console clear-queue email</code></p>
          </div>
          <div id="events" class="section-block">
            <h3 class="block-title">Events</h3>
            <p>Zefire provides a simple event implementation, allowing you to register and dispatch events that occur in your application. <code>Event</code> classes are typically stored in the <code>app/Events</code> directory.</p>
            <p>Events serve as a great way to decouple various aspects of your application. For example, you may wish to send a Slack notification to your user each time an order was shipped.</p>
            <h6>Registering an event</h6>
            <p>You can generate a new event by using the following console command:</p>
            <p><code>php console event \\App\\Events SlackNotification</code></p>
            <div class="code-block">
              @code('php')
[php]

namespace \App\Events;

use Zefire\Contracts\Eventable;

class SlackNotification implements Eventable
{
  public function handle()
  {
    //
  }
}
              @endcode
            </div>
            <p>Then you will have to register it in the <code>config/events.php</code> file.</p>
            <h6>Event Dispatcher</h6>
            <p>You may use the event <code>dispatcher</code> to trigger an event. This event could be instantly dispatched or queued. To instantly dispatch an event, you may use the <code>now</code> method:</p>
            <div class="code-block">
              @code('php')
\Dispatcher::now('slack-order-notification');
              @endcode
            </div>
            <p>Queued and delayed events will use Zefire's queueing system and therefore will expect you to define which queue your events should be sent to. This also requires a queue worker to run. Please read the <a href="/documentation#queues">queue</a> section to find out how queueing works.</p>
            <div class="code-block">
              @code('php')
// Queued event
\Dispatcher::queue('slack-order-notification');

// Delayed event
\Dispatcher::later('slack-order-notification', 3600);
              @endcode
            </div>
          </div>
          
          <div id="file-storage" class="section-block">
            <h3 class="block-title">File Storage</h3>
            <p>Zefire provides a simple file system component to manage files on local or cloud storage systems. Zefire comes with a Amazon S3 adapter. As usual, you can expand the system's capabilities by creating your own adpater and registering your disks in the <code>config/file.php</code> file.</p>
            <p>You may use the <code>disk</code> method to specify the disk you wish to perform actions on.</p>
            <h6>Storing a file</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->put('my_file.txt', 'content of your file');
              @endcode
            </div>
            <h6>Get a file's content</h6>
            <div class="code-block">
              @code('php')
$file = \Filesystem::disk('local')->save('my_file.txt');
              @endcode
            </div>
            <h6>Save a file's content</h6>
            <p>Zefire's file system works in a similar way as model's attributes as the file will remain active until you change disks or the file.</p>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->get('my_file.txt');
\Filesystem::disk('local')->save();
              @endcode
            </div>
            <h6>List files</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->list();
              @endcode
            </div>
            <h6>Check if a file exists</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->exists('my_file.txt');
              @endcode
            </div>
            <h6>Delete a file</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->delete('my_file.txt');
              @endcode
            </div>
            <h6>Get a file's size</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->size('my_file.txt');
              @endcode
            </div>
            <h6>Get a file's last modified datetime</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->lastModified('my_file.txt');
              @endcode
            </div>
            <h6>Get a file's type</h6>
            <div class="code-block">
              @code('php')
\Filesystem::disk('local')->type('my_file.txt');
              @endcode
            </div>
          </div>
          <div id="helpers" class="section-block">
            <h3 class="block-title">Helpers</h3>
            <p>Zefire includes a variety of global "helper" PHP functions. Many of these functions are used by the framework itself, however you are free to use them in your own applications if you find them convenient. Here is a list of these helpers:</p>
            <table class="table table-bordered">
              <thead>
                <th>Function</th><th>Arguments</th><th>Functionality</th>
              </thead>
              <tbody>
                <tr><td>singleton()</td><td>string: class</td><td>Creates a singleton of a given class and stores it in the service container</td></tr>
                <tr><td>make()</td><td>string: class</td><td>Creates a fresh instance of a given class</td></tr>
                <tr><td>model()</td><td>string: class</td><td>Creates a fresh instance of a given model</td></tr>
                <tr><td>dd()</td><td>mixed</td><td>Outputs any data and dies (similar to var_dump)</td></tr>
                <tr><td>dump()</td><td>mixed</td><td>Same as dd() but will not stop script</td></tr>
                <tr><td>camel_case()</td><td>string</td><td>Converts a string to camel case format</td></tr>
                <tr><td>kebab_case()</td><td>string</td><td>Converts a string to kebab case format</td></tr>
                <tr><td>snake_case()</td><td>string</td><td>Converts a string to snake case format</td></tr>
                <tr><td>slugify()</td><td>string</td><td>Converts a string to slug format (similar to kebab case)</td></tr>
                <tr><td>runtime()</td><td>void</td><td>Returns Zefire's runtime</td></tr>
                <tr><td>config()</td><td>string: dot notation</td><td>Gets a setting from a configuration file</td></tr>
                <tr><td>translate()</td><td>string: dot notation</td><td>Gets a translation from a translation file</td></tr>
                <tr><td>object_to_array()</td><td>object</td><td>Converts an object to an array</td></tr>
                <tr><td>array_to_object()</td><td>array</td><td>Converts an array to an object</td></tr>
                <tr><td>array_diff_assoc_recursive()</td><td>array1, array2</td><td>Returns the difference between to associative arrays</td></tr>
                <tr><td>recursive_array_search()</td><td>string:needle, array:haystack</td><td>Searches for a value in an array</td></tr>
                <tr><td>sort_array_keys()</td><td>array, string:order</td><td>Sorts keys from an array</td></tr>
                <tr><td>to_bytes()</td><td>numeric</td><td>Formats a value into bytes</td></tr>
                <tr><td>to_bits()</td><td>numeric</td><td>Formats a value into bits</td></tr>
                <tr><td>to_currency()</td><td>numeric</td><td>Formats a value into currency</td></tr>
                <tr><td>to_int()</td><td>numeric, string:thousands separator</td><td>Formats an integer</td></tr>
                <tr><td>to_float()</td><td>numeric, string:thousands separator</td><td>Formats a float</td></tr>                
              </tbody>
            </table>
          </div>
        </section>

      </div>
    </div>

    <div class="doc-sidebar hidden-xs">
      <nav id="doc-nav">
        <ul id="doc-menu" class="nav doc-menu affix-top" data-spy="affix">
          <li class=""><a class="scrollto" href="#zefire">Welcome to Zefire</a>            
          <li class=""><a class="scrollto" href="#getting-started">Getting started</a>
          	<ul class="nav doc-sub-menu">
          	  <li class=""><a class="scrollto" href="#requirements">Server requirements</a></li>
              <li><a class="scrollto" href="#download">Download</a></li>
          	  <li><a class="scrollto" href="#installation">Installation</a></li>
          	  <li><a class="scrollto" href="#configuration">Configuration</a></li>
            </ul>
          </li>
          <li class=""><a class="scrollto" href="#architecture">Architecture</a>
            <ul class="nav doc-sub-menu">
              <li class=""><a class="scrollto" href="#mvc">MVC Implementation</a></li>
              <li><a class="scrollto" href="#dependency-injection">Dependency Injection</a></li>
              <li><a class="scrollto" href="#aliases">Aliases</a></li>              
            </ul>
          </li>
          <li class=""><a class="scrollto" href="#basics">The basics</a>
            <ul class="nav doc-sub-menu">
              <li class=""><a class="scrollto" href="#routing">Routing</a></li>
              <li><a class="scrollto" href="#middlewares">Middlewares</a></li>
              <li><a class="scrollto" href="#csrf">CSRF Protection</a></li>
              <li><a class="scrollto" href="#controllers">Controllers</a></li>
              <li><a class="scrollto" href="#request">Request</a></li>
              <li><a class="scrollto" href="#validation">Validation</a></li>
              <li><a class="scrollto" href="#views">Views</a></li>
              <li><a class="scrollto" href="#session">Session</a></li>
              <li><a class="scrollto" href="#logging">Logging</a></li>
            </ul>
          </li>
          <li class=""><a class="scrollto" href="#database">Database</a>
            <ul class="nav doc-sub-menu">
              <li class=""><a class="scrollto" href="#db-introduction">Introduction</a></li>
              <li><a class="scrollto" href="#db-configuration">Configuration</a></li>
              <li><a class="scrollto" href="#all">Retrieve all records</a></li>
              <li><a class="scrollto" href="#single">Retrieve a single record</a></li>
              <li><a class="scrollto" href="#select">Select</a></li>
              <li><a class="scrollto" href="#join">Join</a></li>
              <li><a class="scrollto" href="#where">Where</a></li>
              <li><a class="scrollto" href="#whereor">Where or</a></li>
              <li><a class="scrollto" href="#between">Between</a></li>
              <li><a class="scrollto" href="#wherein">Where in</a></li>
              <li><a class="scrollto" href="#wherenotin">Where not in</a></li>
              <li><a class="scrollto" href="#orderby">Order by</a></li>
              <li><a class="scrollto" href="#grouping">Group by and having</a></li>
              <li><a class="scrollto" href="#insert">Insert</a></li>
              <li><a class="scrollto" href="#update">Update</a></li>
              <li><a class="scrollto" href="#delete">Delete</a></li>
              <li><a class="scrollto" href="#restore">Restore</a></li>
              <li><a class="scrollto" href="#raw">Raw queries</a></li>
            </ul>
          </li>
          <li class=""><a class="scrollto" href="#orm">ORM</a>
            <ul class="nav doc-sub-menu">
              <li class=""><a class="scrollto" href="#orm-introduction">Introduction</a></li>
              <li><a class="scrollto" href="#models">Models</a></li>
              <li><a class="scrollto" href="#relations">Relations</a></li>
              <li><a class="scrollto" href="#orm-create">Create</a></li>
              <li><a class="scrollto" href="#orm-save">Save</a></li>
              <li><a class="scrollto" href="#orm-delete">Delete</a></li>
              <li><a class="scrollto" href="#orm-restore">Restore</a></li>
            </ul>
          </li>
          <li class=""><a class="scrollto" href="#security">Security</a>
            <ul class="nav doc-sub-menu">
              <li class=""><a class="scrollto" href="#authentication">Authentication</a></li>
              <li><a class="scrollto" href="#api-authentication">API Authentication</a></li>
              <li><a class="scrollto" href="#authorization">Authorization</a></li>
              <li><a class="scrollto" href="#encryption">Encryption</a></li>
              <li><a class="scrollto" href="#hashing">Hashing</a></li>
            </ul>
          </li>
          <li class=""><a class="scrollto" href="#advanced">Advanced</a>
            <ul class="nav doc-sub-menu">
              <li class=""><a class="scrollto" href="#console">Console</a></li>
              <li><a class="scrollto" href="#cache">Cache</a></li>
              <li><a class="scrollto" href="#queues">queues</a></li>
              <li><a class="scrollto" href="#events">Events</a></li>              
              <li><a class="scrollto" href="#file-storage">File Storage</a></li>
              <li><a class="scrollto" href="#helpers">Helpers</a></li>
            </ul>
          </li>          
        </ul>
      </nav>
    </div>

  </div>
</div>
<script>hljs.initHighlightingOnLoad();</script>