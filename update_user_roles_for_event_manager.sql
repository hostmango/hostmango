-- This script updates the user_role JSON object in the kullanicilar table
-- to include new permissions for the Event Manager feature.

-- Please backup your database before running this script.

-- Instructions:
-- 1. Connect to your database.
-- 2. Run the appropriate UPDATE statements for your roles.
--    - You may need to adjust the WHERE clause to target specific roles
--      (e.g., WHERE role_name = 'admin' OR role_id = 1).
--    - The examples below assume you have an 'admin' role that should
--      receive all new event manager permissions and a 'editor' role
--      that should receive only viewing permissions.

-- Example for an 'admin' role (grant all new permissions)
-- Ensure you identify your admin role correctly (e.g., by name or ID)
UPDATE kullanicilar
SET user_role = JSON_MERGE_PATCH(
    user_role,
    '{
        "eventManagerGorebilsin": true,
        "eventManagerDuzenleyebilsin": true,
        "eventManagerSilebilsin": true
    }'
)
WHERE role_name = 'admin'; -- Adjust this condition based on your table structure

-- Example for an 'editor' role (grant only viewing permission)
-- Ensure you identify your editor role correctly (e.g., by name or ID)
UPDATE kullanicilar
SET user_role = JSON_MERGE_PATCH(
    user_role,
    '{
        "eventManagerGorebilsin": true,
        "eventManagerDuzenleyebilsin": false,
        "eventManagerSilebilsin": false
    }'
)
WHERE role_name = 'editor'; -- Adjust this condition based on your table structure

-- Example for a new 'event_manager' role (grant all event specific permissions)
-- This assumes you might create a dedicated role for event management.
UPDATE kullanicilar
SET user_role = JSON_MERGE_PATCH(
    user_role,
    '{
        "eventManagerGorebilsin": true,
        "eventManagerDuzenleyebilsin": true,
        "eventManagerSilebilsin": true
    }'
)
WHERE role_name = 'event_manager'; -- Adjust this condition based on your table structure


-- Verification (optional):
-- After running the updates, you can verify the changes.
-- SELECT user_id, user_name, user_role FROM kullanicilar WHERE role_name IN ('admin', 'editor', 'event_manager');

-- IMPORTANT:
-- The JSON_MERGE_PATCH function is used here.
-- For MySQL, this function was introduced in version 5.7.22 and for MariaDB in 10.2.25, 10.3.16, 10.4.6.
-- If you are using an older version, you might need to fetch the JSON,
-- parse it in an application language, add the keys, and then update the JSON string.
--
-- Alternative for older MySQL/MariaDB versions (less direct, requires application logic or more complex SQL):
-- 1. SELECT user_id, user_role FROM kullanicilar WHERE role_name = 'admin';
-- 2. For each user, take the user_role JSON, parse it, add the new keys, stringify it back.
-- 3. UPDATE kullanicilar SET user_role = '<new_json_string>' WHERE user_id = <id>;
--
-- If your JSON structure is simple and consistently lacks these keys,
-- you might be able to use JSON_SET, but JSON_MERGE_PATCH is generally safer
-- as it adds or updates keys without affecting existing ones.
--
-- If the `user_role` column does not exist or is not of a JSON type, this script will fail.
-- Ensure the `kullanicilar` table and `user_role` column with JSON type exist.
-- If `user_role` is TEXT/VARCHAR, you'll need string manipulation functions, which are more complex and error-prone.
-- It's highly recommended to use the native JSON type if available.

-- Further role-specific adjustments might be needed based on your application's requirements.
-- For example, a 'viewer' role might get:
-- UPDATE kullanicilar
-- SET user_role = JSON_MERGE_PATCH(
--     user_role,
--     '{
--         "eventManagerGorebilsin": true,
--         "eventManagerDuzenleyebilsin": false,
--         "eventManagerSilebilsin": false
--     }'
-- )
-- WHERE role_name = 'viewer'; -- Adjust this condition

COMMIT;
