# proxy8080
Lightweight PHP proxy for Apache to serve content in a web directory hosted on a fire-walled port

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
