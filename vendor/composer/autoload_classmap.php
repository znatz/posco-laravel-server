<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AuthController' => $baseDir . '/app/controllers/AuthController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'BtamassTableSeeder' => $baseDir . '/app/database/seeds/BtamassTableSeeder.php',
    'Cartalyst\\Sentry\\Groups\\GroupExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\GroupNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\NameRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserBannedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserSuspendedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\LoginRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\PasswordRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserAlreadyActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\WrongPasswordException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'CashierReceiver' => $baseDir . '/app/controllers/CashierReceiver.php',
    'CategoriesController' => $baseDir . '/app/controllers/CategoriesController.php',
    'CategoriesTableSeeder' => $baseDir . '/app/database/seeds/CategoriesTableSeeder.php',
    'Category' => $baseDir . '/app/models/Category.php',
    'CreatePaymentsTable' => $baseDir . '/app/database/migrations/2015_08_04_084338_create_payments_table.php',
    'DataFromIOsController' => $baseDir . '/app/controllers/DataFromIOsController.php',
    'DataFromIOsTableSeeder' => $baseDir . '/app/database/seeds/DataFromIOsTableSeeder.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'Datafromio' => $baseDir . '/app/models/DataFromIO.php',
    'Employee' => $baseDir . '/app/models/Employee.php',
    'EmployeesController' => $baseDir . '/app/controllers/EmployeesController.php',
    'EmployeesTableSeeder' => $baseDir . '/app/database/seeds/EmployeesTableSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'Item' => $baseDir . '/app/models/Item.php',
    'ItemsController' => $baseDir . '/app/controllers/ItemsController.php',
    'ItemsTableSeeder' => $baseDir . '/app/database/seeds/ItemsTableSeeder.php',
    'MasterRecordController' => $baseDir . '/app/controllers/MasterRecordController.php',
    'MigrationCartalystSentryInstallGroups' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225929_migration_cartalyst_sentry_install_groups.php',
    'MigrationCartalystSentryInstallThrottle' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225988_migration_cartalyst_sentry_install_throttle.php',
    'MigrationCartalystSentryInstallUsers' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php',
    'MigrationCartalystSentryInstallUsersGroupsPivot' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot.php',
    'Normalizer' => $vendorDir . '/patchwork/utf8/src/Normalizer.php',
    'Payment' => $baseDir . '/app/models/Payment.php',
    'PaymentsController' => $baseDir . '/app/controllers/PaymentsController.php',
    'PaymentsTableSeeder' => $baseDir . '/app/database/seeds/PaymentsTableSeeder.php',
    'ReceiptLine' => $baseDir . '/app/models/ReceiptLine.php',
    'ReceiptLinesController' => $baseDir . '/app/controllers/ReceiptLinesController.php',
    'ReceiptLinesTableSeeder' => $baseDir . '/app/database/seeds/ReceiptLinesTableSeeder.php',
    'Receiptrecord' => $baseDir . '/app/models/Receiptrecord.php',
    'ReceiptrecordsController' => $baseDir . '/app/controllers/ReceiptrecordsController.php',
    'ReceiptrecordsTableSeeder' => $baseDir . '/app/database/seeds/ReceiptrecordsTableSeeder.php',
    'Receiptsetting' => $baseDir . '/app/models/Receiptsetting.php',
    'ReceiptsettingsController' => $baseDir . '/app/controllers/ReceiptsettingsController.php',
    'ReceiptsettingsTableSeeder' => $baseDir . '/app/database/seeds/ReceiptsettingsTableSeeder.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'Setting' => $baseDir . '/app/models/Setting.php',
    'SettingsController' => $baseDir . '/app/controllers/SettingsController.php',
    'SettingsTableSeeder' => $baseDir . '/app/database/seeds/SettingsTableSeeder.php',
    'Shop' => $baseDir . '/app/models/Shop.php',
    'ShopsController' => $baseDir . '/app/controllers/ShopsController.php',
    'ShopsTableSeeder' => $baseDir . '/app/database/seeds/ShopsTableSeeder.php',
    'Shopsetting' => $baseDir . '/app/models/Shopsetting.php',
    'ShopsettingsController' => $baseDir . '/app/controllers/ShopsettingsController.php',
    'ShopsettingsTableSeeder' => $baseDir . '/app/database/seeds/ShopsettingsTableSeeder.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'Testing' => $baseDir . '/app/controllers/testing.php',
    'User' => $baseDir . '/app/models/User.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
    'iosReceiver' => $baseDir . '/app/controllers/iosReceiver.php',
);
