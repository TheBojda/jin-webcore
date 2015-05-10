jin-webcore is a minimalistic web framework. Base entity of webcore is the handler. Handlers are assigned to paths which are defined by regular expressions, and activated through URL-s or web actions. Every handler is a class, which implements the WebcoreHandler interface, and it's process method. 

Look at a simple PHP handler:

```php
class TestHandler implements WebcoreHandler {
		
  public function process(&$context) {
    echo "The id is " . $context['request/parameters']['id'];
  }

}

WebcoreSingleton::getInstance()->registerHandler("^/test/(?P<id>\d+)$", new TestHandler);
```

This example defines a handler, and assign it to the {{{^/test/(?P<id>\d+)$}}} path. When the framework calls the handler, put the GET, POST and URL parameters to the context with the 'request/parameters' key. When you look at the http://.../test/1234?param=5 URL, the parameters value will be id => 1234, and param => 5. There is another way to call handlers. Handlers can be called by special submit buttons. If the button name starts with the 'action/' string, the framework will find and call the assigned handler.

Look at a simple example, a simple forum view with 3 buttons:

```html
...
<form method="POST">
  ...
  <input type="submit" name="action/button_test/button1" value="Button 1"/>
  <input type="submit" name="action/button_test/button2" value="Button 2"/>
</form>
...
```

And the handler in PHP:

```php	
WebcoreSingleton::getInstance()->registerHandler("^button_test/(?P<name>\w+)$", new ButtonHandler);
```

When the user push the first button, the framework will call the ButtonHandler, and put the 'button1' string to the name variable. If the user push the second button, the framework will also call the ButtonHandler with the 'button2' name parameter. After the action handler the framework calls the handler, assigned to the URL. In most cases the action handler do some data manipulation (add a new forum post, delete a row from a table, etc.), and the URL handler renders the view. For better understanding, please look at the code in the subversion repository.

See also:

    https://github.com/TheBojda/jin-plugin - simple plugin framework for Java and PHP 

    https://github.com/TheBojda/jin-template - simple template engine for Java and PHP, using plain HTML as source
