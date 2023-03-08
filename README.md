# proxy8080
Lightweight PHP proxy for Apache to serve content in a web directory hosted on a fire-walled port

This tool could come in handy for devops engineers troubleshooting a network/security issue in a production environment, but is not recommended for use in production environments. Also, use caution when exposing internal and/or HTTPS resources to the world.

## Requirements for use
- Web server with curl, Apache and PHP already installed and configured
- Access to /proxy8080/ web directory for your server (This is where we run from by default)
- Ability to run another web software (e.g. webpack-dev-server) on port 8080 with localhost access

## Installation instructions
1. Clone repo to your webserver that is already running Apache+PHP
2. Create a subdirectory in your web root (e.g. /var/www/example.com/) named 'proxy8080'
3. Copy 'index.php' and '.htaccess' files to the 'proxy8080' direcory
4. Start your web application that normally runs on port 8080 (e.g. 'npm run dev' for a node+svelte+webpack-dev-server app)
5. Open your browser to the '/proxy8080' location on your domain (e.g. https://example.com/proxy8080)

## FAQ

Q: I'm getting Server 500 errors, I'm not seeing what I think I should be seeing, my styling appears to be broken, javascript isn't working and this doesn't seem to do what I needed it to do; help?!

A: Make sure that Apache is configured to allow overrides and set your proxyPath in both the .htaccess file and the config.ini files!


Q: My application runs on a port other than 8080, will proxy8080 still work for me?

A: Of course! You can set the value of the proxiedPort variable in your config.ini to any port number between 1 and 65535 (e.g. for a Node app running a dev port of 3000, just set proxiedPort to 3000.)
