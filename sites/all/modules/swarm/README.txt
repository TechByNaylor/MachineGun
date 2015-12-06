Swarm is a module that allows many builds of the same site to have interconnectivity through an event framework.


For example, our live server, hosted on the internet receives a call that triggers an event.
It will distribute that event across all connected (and authorized) machines. Even machines that are connected remotely across firewalls.

So, if eBay webhooks an event, I want all of my nodes in the swarm to receive that event as well.

If my local machine emits a system wide event, I want my live server to emit that same event as well.