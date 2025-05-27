# New Event Manager Permissions

This document describes new permissions that have been added to support the Event Manager feature. These permissions control user access to view, edit, and delete events within the system.

## Permissions Overview

The new permissions are stored as boolean flags within the `user_role` JSON object in the user management table (typically named `kullanicilar`).

1.  **`eventManagerGorebilsin`**:
    *   **Description**: Grants the ability to view events in the Event Manager. Users with this permission can see event listings, details, and schedules.
    *   **Type**: Boolean (`true` or `false`)
    *   **Example**: If `true`, the user can access the Event Manager section and see events. If `false` (or the key is missing), the user cannot view events.

2.  **`eventManagerDuzenleyebilsin`**:
    *   **Description**: Grants the ability to create new events and edit existing ones within the Event Manager. This includes changing event details, times, locations, and other event-specific data.
    *   **Type**: Boolean (`true` or `false`)
    *   **Prerequisite**: Typically, a user should also have `eventManagerGorebilsin: true` to effectively use this permission.
    *   **Example**: If `true`, the user can access event creation and editing forms. If `false`, these functionalities will be disabled or hidden.

3.  **`eventManagerSilebilsin`**:
    *   **Description**: Grants the ability to delete events from the Event Manager.
    *   **Type**: Boolean (`true` or `false`)
    *   **Prerequisite**: Typically, a user should also have `eventManagerGorebilsin: true` to effectively use this permission.
    *   **Example**: If `true`, the user will have access to delete events. If `false`, the delete option will be disabled or hidden.

## Updating User Roles

To implement these new permissions, a database administrator needs to update the `user_role` JSON object for the relevant user roles in the `kullanicilar` table (or your equivalent user management table).

We have provided an SQL script, `update_user_roles_for_event_manager.sql`, to facilitate this process. This script demonstrates how to add these new permission keys using the `JSON_MERGE_PATCH` function (available in newer MySQL and MariaDB versions).

**Key steps for the Database Administrator:**

1.  **Backup your database**: Before running any update scripts, ensure you have a recent and restorable backup of your database.
2.  **Review the SQL script**: Open and carefully review the `update_user_roles_for_event_manager.sql` script. Understand what it does and how it targets roles for updates (e.g., using `WHERE role_name = 'admin'`).
3.  **Customize the script**:
    *   Adjust the `WHERE` clauses in the `UPDATE` statements to match the specific `role_name` or `role_id` values used in your system.
    *   Determine which roles should receive which permissions. For example:
        *   An `admin` role might receive all three permissions set to `true`.
        *   An `editor` or `event_creator` role might receive `eventManagerGorebilsin: true` and `eventManagerDuzenleyebilsin: true`, but `eventManagerSilebilsin: false`.
        *   A `viewer` role might only receive `eventManagerGorebilsin: true`.
    *   The script provides examples for common scenarios. You will likely need to add, remove, or modify these examples to fit your role structure.
4.  **Test in a staging environment**: If possible, test the script in a non-production (staging) environment first.
5.  **Execute the script**: Run the customized SQL script against your production database.
6.  **Verify changes**: After execution, verify that the `user_role` JSON object for the targeted roles has been updated correctly. The script includes an optional verification query.

**Important Considerations:**

*   **Database Version**: The provided script uses `JSON_MERGE_PATCH`, which requires MySQL 5.7.22+ or MariaDB 10.2.25+ (and later versions). If you are using an older database version, the script includes notes on alternative approaches, which may involve fetching the JSON, modifying it in an application layer or with more complex SQL string functions, and then updating the record.
*   **Existing JSON Structure**: `JSON_MERGE_PATCH` will add the new keys if they don't exist or update them if they do. It will not affect other existing keys in the JSON object.
*   **Table and Column Names**: The script assumes your user table is `kullanicilar` and the JSON column is `user_role`. If your naming differs, update the script accordingly.

By following these instructions and utilizing the provided SQL script, you can effectively integrate the new Event Manager permissions into your user role system.
