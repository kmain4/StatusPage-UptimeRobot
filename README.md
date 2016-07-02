# StatusPage-UptimeRobot

`StatusPage-UptimeRobot` is a simple flat PHP file that retrieve's [UptimeRobot](https://www.uptimerobot.com "Uptime Robot's Homepage")'s sensors via their API and turns it into a professional service status page .

  - Import's monitor data from UptimeRobot.
  - Extracts monitor IDs that are sorted into each category.
  - Reports current status and recent logs.

This project is designed to be a drag-and-drop solution used in conjunction with a provider like [GitHub.io](https://pages.github.com/) to provide an easy, off-site solution for labs and small service clusters. 

*Do not expect advanced features within this package due to the flat, one PHP file limitation!*

### Version
1.0.2

### Included Projects and Libraries

`StatusPage-UptimeRobot` uses a number of projects:

* [Cachet.io](https://github.com/CachetHQ/Cachet) - An open source status page system for everyone.
* [Jaco Strauss' Tech Support Excuse Generator](http://www.strauss.za.com/sla/support.asp) - IT excuses for downtime.
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [jQuery] - duh

### Installation

`StatusPage-UptimeRobot` will run on any web-server that is capable of serving the HTML file. It is reccomended to host outside of your network for availability.

Save `status.html`:
```
https://raw.githubusercontent.com/kmain4/StatusPage-UptimeRobot/master/status.html
````

Edit the configuration at the top of the file. 

Add your Monitors' IDs to the `categories` object on line `188`. You can find your Monitor IDs by clicking on them in the UptimeRobot website and looking at your URL. Also add your API Key.

Example: `https://uptimerobot.com/dashboard.php#888246374` The ID for this Monitor is `888246374`.

Head over to GitHub and create a new repository named `username.github.io`, where username is your username (or organization name) on GitHub. *If the first part of the repository doesn’t exactly match your username, it won’t work, so make sure to get it right!*

Finally, simply push `status.html` to your repository and rename it to `index.html`.

You can also use GitHub.io pages with custom domains like `status.constoso.com`. [Read more about it here.](https://help.github.com/articles/quick-start-setting-up-a-custom-domain/)


### Images

![](https://cloud.githubusercontent.com/assets/8865327/16458877/c490ebd2-3dee-11e6-956f-871d57679b7c.PNG)

![](https://cloud.githubusercontent.com/assets/8865327/16458880/ca751744-3dee-11e6-8ed9-1940763880c0.PNG)
