**Update:** I originally wrote [this article for Laravel Valet](https://yoeri.me/blog/increase-the-timeout-of-laravel-valet). Earlier this year I switched to Herd and ran into the same problem so here's an article explaining how to do it in Laravel Herd.

I've been working on a legacy app that generates a PDF during the request. This takes a couple of minutes and consistenly caused Nginx to return a 504 timeout.

I spent way too much time figuring out how to increase the limit so if you're using Laravel Herd, here's how to increase the maximum time of a request.

## Increasing the timeout
The default timeout is 60s. Let's increase that.

**Step 1:**
Open the Nginx configuration file by running this command:

```bash
nano ~/Library/Application Support/Herd/config/nginx/herd.conf
```

**Step 2:**
Among all other `fastcgi_` variables you add the following:

```bash
fastcgi_connect_timeout 1d;
fastcgi_read_timeout 1d;
fastcgi_send_timeout 1d;
```

Because this is a development environment `1d` is fine, but make sure to set a sensible timeout if you are working in a production environment.

**Step 3:**
Restart Herd.

```bash
herd restart
```

## Et voilà
There you go. You can now continue working on your project. Just let me state that you should rarely need this. A normal request should easily be able to finish within 60 seconds. 

You shouldn't run slow tasks during an HTTP request. Instead, create a job and run them on the queue.