# Teamspeak-Viewer_EXT

## Quick Install
You can install this on the latest release of phpBB 3.1 by following the steps below:

*Unzip the downloaded release, and change the name of the folder to `ts`.
*In the `ext` directory of your phpBB board, create a new directory named `tecs` (if it does not already exist).
*Copy the `ts` directory to `phpBB/ext/tecs/` (if done correctly, you'll have the main composer JSON file at (your forum root)/ext/tecs/ts/composer.json).
*Navigate in the ACP to `Customise -> Manage extensions`.
*Look for `Teamspeak-Viewer_EXT` under the Disabled Extensions list, and click its `Enable` link.
*Set up and configure Teamspeak-Viewer by navigating in the ACP to `Extensions` -> `Teamspeak-Viewer`.

## Uninstall
*Navigate in the ACP to `Customise -> Extension Management -> Extensions`.
*Look for `Teamspeak-Viewer_EXT` under the Enabled Extensions list, and click its `Disable` link.
*To permanently uninstall, click `Delete Data` and then delete the `/ext/tecs/ts` directory.


### Custom Templates
The Teamspeak-Viewer_EXT template designed for Prosilver and Prosilver-based styles.
However, you can add other versions of that Teamspeak-Viewer_EXT template to other styles too, if needed (such as to match the look of the specific style). 

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)


##Checklist if you encounter connection problems to the teamspeak-server
    #Check if the teamspeak ports are open (web-host-server and the teamspeak-server-host)
        *Default voice port (UDP in): 9987
        *Default filetransfer port (TCP in): 30033
        *Default serverquery port (TCP in): 10011
    #Ensure that you have an entry in the query_ip_whitelist.txt
    #Ensure that the query-client has sufficient privileges (this is mostly the case for teamspeak hosters)
	#Ensure that you teamspeak settings are normal
        *Please note: only IPs work in section "teamspeak host IP". For example use "127.0.0.1" not "localhost"
