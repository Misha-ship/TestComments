-- Створення таблиці users
CREATE TABLE `users` (
                         `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Створення таблиці comments
CREATE TABLE `comments` (
                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                            `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `author_id` bigint unsigned DEFAULT NULL,
                            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `home_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
                            `parent_id` bigint unsigned DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            KEY `comments_parent_id_foreign` (`parent_id`),
                            KEY `comments_author_id_foreign` (`author_id`),
                            CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
                            CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;