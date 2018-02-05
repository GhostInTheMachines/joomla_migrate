Synopsis

Migration skeleton for Joomla Content Management System Migration.

Motivation

This project was started in an effort to make the process of moving from a Joomla 3.x CMS to Drupal 8.x easier for anyone who love Drupal 8 and wants to see more organizations use it.
NOTE: Joomla environments can vary widely depending on how the site was setup.  Some of the migrations in this repository were performed by aggregating Joomla tables into several
custom tables and then using the custom tables to do the import.

If anyone finds consistent tables that could be built into this repository feel free to write them in and submit a pull request.

Installation

Assumptions:

1. You already have a local Drupal 8.x instance installed on your local machine.

2. You must first create a second database in your environment of choice that contains the following tables:
(we are using Acquia DevDesktop, but you could use an AMP stack, Docker swarm or anything else that lets you manipulate the tables and prepare for the running of the migration).
  a. xi83f_categories
  b. xi83f_content
  c. xi83f_contentitem_tag_map
  d. xi83f_languages
  e. xi83f_tags
  f. xi83f_users
  *** NOTE *** your prefix will be something other than xi83f_

3. If you are migrating on a local development environment, you have setup a settings.local.php (directions can be found here URL: https://knpuniversity.com/screencast/drupal8-under-the-hood/debugging)
4. Added the following to your settings.php or settings.local.php if you have a local development environment setup from assumption 3

   $databases['YourDB_Name']['default'] = array(
     'driver' => 'mysql',
     'database' => 'YourDBname',
     'username' => 'drupaluser',
     'password' => '',
     'host' => '127.0.0.1',
     'port' => ThePortForYourDB,
   );

 GETTING THE MODULE
  
1. You will need to clone down the repository either from this fork that contains all of our most current patches or from the     original version found at github.com/theneonlobster/joomla_migrate
2. If you are using this fork:
    a. Add remote from original repository in your forked repository:

        cd into/cloned/fork-repo
        git remote add upstream git://github.com/theneonlobster/joomla_migrate.git
        git fetch upstream
    b. add and commit any local changes
    c. Pull upstream changes from original repo
        git pull upstream 8.x-1.x


3. Edit the config/install/joomlamigrate.settings file
    a.Change the name of the custom database that you have created to match that of the database key.
    b. Change the prefix to match your database tables prefix

5. From the Drupal Admin interface.
    a. Enable Joomla Migrate and its dependencies (Migrate, Migrate Plus, Migrate Tools)

6. Verify the migrate commands available
    drush help --filter=migrate

7. Verify migrations available
    drush ms

8. Create a custom content type in Drupal that contains all of the fields that you intend to import from Joomla


