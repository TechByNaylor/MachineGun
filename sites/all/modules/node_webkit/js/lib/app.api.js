

//move some important variables to the parent scope so our turret.api can access them!

//right now, all we really need is the Drupal object.  we'll get things we need from here.
//for example, we should expose some user data to this object from our node_webkit module, so our desktop apps can interact with Drupal data.
global.Drupal = parent.Drupal = Drupal;