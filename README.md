# htaccess-edit-drupal
A module to edit the .htaccess file from within Drupal interface
It is tested on Drupal 10 and php8.1
Place the folder htaccess_editor in modules/contrib and activate the module with the name htaccess_edit.
A menu item with the name Htaccess Editor will appear under /admin/config/system/
The full path to the module is /admin/config/system/htaccess-editor

June 20 2023 added one line to the module file to avid errors in certain situations. The line added to the top was
use Drupal\Core\Form\FormStateInterface;
