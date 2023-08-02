# Back-end

## Intro

So far, we've explored amazing areas of the web and built a lot of Frontend stuff.
It's time now to discover the other side of the web app : the **Back-end** ! 📡💥😲

And what better way to get started with **PHP** ! Indeed PHP is still very used on the market. According to [W3Techs’ data](https://w3techs.com/technologies/details/pl-php), PHP is used by 77.5% of all websites with a known server-side programming language. So almost 8 out of every 10 websites that you visit on the Internet are using PHP in some way.

## What is PHP ?

PHP is a  **Backend** software, meaning that it runs on the *web server* (whereas the **Frontend** designates the software acting on the side of the *client* : the *browser*).

PHP enables the web server to **"think before speaking**". In Computer Sciences, "to think" means to calculate, process information. To speak means returning to the client (the browser from where originated the HTTP request).
PHP can create responses in most formats: very often HTML, but also json, xml, CSS, JavaScript...

## Why use PHP to return something else ?

Because this allows you to create **dynamic** pages, rather than **static** ones.

For instance, imagine you wanted to create a web page that would say "Hello!" to each of the 8 billion inhabitants of our lovely planet.
If you had to create these pages statically, you would need to create 8 billion pages.

- Page 1 :
```HTML
<html>
<head>...</head>
<body>
    <h1>Hello Freddy Krueger!</h1>
</body>
</html>
```

- Page 2 :
```HTML
<html>
<head>...</head>
<body>
    <h1>Hello Jason Voorhees!</h1>
</body>
</html>
```


... it would take years, isn't it? Moreover, by the time you'd done making a thousand page, you would already have to delete some (for the deceased folks) and add some more (the babies born since you started your work)... That's not a good solution.

But what if you could separate the data from the display markup ?
You would fetch the data from a database and simply use one PHP file containing the markup and a variable receiving the person's name (via the url for example). That file would generate HTML containing a dynamic element.

One way to do it would be to populate the variable via the URL, like this:

http://citizens.net/humans/index.php?name=Freddy&lastname=Krueger


```PHP
<html>
<head>...</head>
<body>
    <h1>Hello <?php echo $_GET['nom']; ?> <?php echo $_GET['lastname']; ?>!</h1>
</body>
</html>
```

You could then just send to each person its personal URL and done!

*example :*
http://citizens.net/humans/index.php?name=John&lastname=McClane
http://citizens.net/humans/index.php?name=Marty&lastname=McFly
http://citizens.net/humans/index.php?name=Bruce&lastname=Wayne

There ! A softer, warmer lofter Earth!

## What do we need for PHP to work ?

To properly understand what PHP does, it's useful to look at how a website works.
1. Browser --> requests yoursite.com.
2. Server prepares a response (e.g. looks for an index.php to load).
3. PHP is interpreted (= executed: if statements, loops, ...).
4. The resulting webpage is sent to the browser (= the response).
5. Browser receives the response and renders the html: shows text, loads images and executes any Javascript.

Up until now, we've mainly worked on step 5: write styling in css or logic in Javascript.
We can give them to any browser, and it properly knows what to do - except Internet Explorer maybe 😝

### A server + PHP
A browser can't read PHP - a server can.
So, you need a **server** first. Commonly used are **Apache** (most used) and **Nginx**, both are fine choices.
During development, we use a (free) local server to prevent the need for an external one (which is usually not free).
A server can react to incoming (browser) requests and send the webpage as a response.

To interpret the PHP, **PHP needs to be installed** (a server can interpret other stuff as well, as long as you install it).

Tools commonly include the full package: a server + PHP.
Once you have this, you are ready to start working with PHP.

### A database
When data has to be saved or loaded, we need to use a **database**. It can be done with one called **MySQL** or **MariaDB**, but a lot of other alternatives exist and are compatible with PHP.

For the next few days, we will focus on **MySQL** and you will learn how to _create_, _read_, _update_ and _delete_ data.

### User interface for database
To help you handle the administration of your database, you should use an interface like **phpMyAdmin**, or a database software like **DBeaver**, **TablePlus** or even your IDE like **PHPStorm**!

## Local development

When we work on a project, we usually don't work directly on the machine that will serve the files of the website or application, because the slightest typo mistake would look bad and hurt the client's brand image (at the very least).

So we develop on our own PC ("development environment"), until the files are ready for production (we then put them on the "production environment").

## Next step

So, now, you know a little bit more about the purpose of PHP and MySQL, let's begin by installing our own environment on your PC.

For that we'll use a tool called Docker...

--> [Docker installation](./01-docker/01-docker-installation)   

