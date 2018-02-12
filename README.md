# Fastpic

A web-app allowing users to upload and share images and comments with each other


## Business Requirements

- Users can upload image files in common formats (JPEG, [GIF](https://imgur.com/GYK1Sub), PNG, SVG, BMP)
- Users can comment on each other's images
- Users can like other users images and comments
- Users can follow other users
- Users can view a feed of their followed users' images
- Users can log in with Google, Facebook, or OpenId
- Will be viewable at https://fastpic.code-mates.com

## Technical Requirements

- Will be written in HTML5, PHP7, CSS, and SQL
- Will not use a PHP framework
- Will be styled using [bootstrap v4](https://getbootstrap.com)
- Will use MySQL database
- Will store user data + images on local filesystem
- Will be served from Apache web server

## Vagrant Install Fix
I ran into a few problem installing vagrant on a second computer and this was the fix. If you get this error on `vagrant up`:
```
Vagrant was unable to mount VirtualBox shared folders. This is usually
because the filesystem "vboxsf" is not available. This filesystem is
made available via the VirtualBox Guest Additions and kernel module.
Please verify that these guest additions are properly installed in the
guest. This is not a bug in Vagrant and is usually caused by a faulty
Vagrant box. For context, the command attempted was:

mount -t vboxsf -o uid=1000,gid=1000 var_www_html /var/www/html

The error output from the command was:

mount: unknown filesystem type 'vboxsf'
```
Run this command:
```bash
vagrant plugin install vagrant-vbguest
```
Then try `vagrant up` again.
