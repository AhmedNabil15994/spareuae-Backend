<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {

            $this->insertCountries();
            $this->insertCities();
            $this->insertSates();

            DB::commit();
        } catch (\Exception$e) {
            DB::rollback();
            throw $e;
        }
    }

    public function insert($string)
    {
        DB::statement($string);
    }

    private function insertCountries()
    {
        $data = "

        INSERT INTO `countries` (`id`, `status`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
        (1, 1, 'KW', NULL, '2020-01-21 07:37:03', '2020-01-21 07:37:03');
        ";
        $this->insert($data);

        $data = "
            INSERT INTO `country_translations` (`id`, `title`, `slug`, `locale`, `country_id`, `created_at`, `updated_at`) VALUES
            (1, 'Kuwait', 'kuwait', 'en', 1, '2020-01-21 07:37:03', '2020-01-21 07:37:03'),
            (2, 'الكويت', 'الكويت', 'ar', 1, '2020-01-21 07:37:03', '2020-01-21 07:37:03');
        ";
        $this->insert($data);
    }

    public function insertCities()
    {
        $data = "
        INSERT INTO `cities` (`id`, `status`, `country_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
        (4, 1, 1, NULL, '2020-05-15 18:53:24', '2020-05-15 18:53:24'),
        (6, 1, 1, NULL, '2020-05-15 18:55:32', '2020-05-15 18:55:32'),
        (7, 1, 1, NULL, '2020-05-15 18:57:43', '2020-05-15 18:57:43'),
        (8, 1, 1, NULL, '2020-05-15 18:58:13', '2020-05-15 18:58:13'),
        (9, 1, 1, NULL, '2020-05-15 19:00:02', '2020-05-15 19:00:02'),
        (10, 1, 1, NULL, '2020-05-15 19:00:40', '2020-05-15 19:00:40');
        ";
        $this->insert($data);

        $data = "
        INSERT INTO `city_translations` (`id`, `title`, `slug`, `locale`, `city_id`, `created_at`, `updated_at`) VALUES
        (7, 'Alfarwanya', 'alfarwanya', 'en', 4, '2020-05-15 18:53:24', '2020-05-15 18:53:24'),
        (8, 'الفروانية', 'الفروانية', 'ar', 4, '2020-05-15 18:53:24', '2020-05-15 18:53:24'),
        (11, 'al -asimah', 'al--asimah', 'en', 6, '2020-05-15 18:55:32', '2020-05-15 18:55:32'),
        (12, 'العاصمة', 'العاصمة', 'ar', 6, '2020-05-15 18:55:32', '2020-05-15 18:55:32'),
        (13, 'Al-Ahmadi', 'al-ahmadi', 'en', 7, '2020-05-15 18:57:43', '2020-05-15 18:57:43'),
        (14, 'الأحمدي', 'الأحمدي', 'ar', 7, '2020-05-15 18:57:43', '2020-05-15 18:57:43'),
        (15, 'Aljahra', 'aljahra', 'en', 8, '2020-05-15 18:58:13', '2020-05-15 18:58:13'),
        (16, 'الجهراء', 'الجهراء', 'ar', 8, '2020-05-15 18:58:13', '2020-05-15 18:58:13'),
        (17, '7awaly', '7awaly', 'en', 9, '2020-05-15 19:00:02', '2020-05-15 19:00:02'),
        (18, 'حولي', 'حولي', 'ar', 9, '2020-05-15 19:00:02', '2020-05-15 19:00:02'),
        (19, 'Mubarak akkabyr', 'mubarak-akkabyr', 'en', 10, '2020-05-15 19:00:40', '2020-05-15 19:00:40'),
        (20, 'مبارك الكبير', 'مبارك-الكبير', 'ar', 10, '2020-05-15 19:00:40', '2020-05-15 19:00:40');
        ";
        $this->insert($data);
    }

    public function insertSates()
    {
        $data = "
        INSERT INTO `states` (`id`, `status`, `city_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
        (4, 1, 6, NULL, '2020-05-15 19:05:38', '2020-05-15 19:44:47'),
        (5, 1, 6, NULL, '2020-05-15 19:06:15', '2020-05-15 19:06:15'),
        (6, 1, 6, NULL, '2020-05-15 19:06:53', '2020-05-15 19:06:53'),
        (7, 1, 6, NULL, '2020-05-15 19:07:24', '2020-05-15 19:07:24'),
        (8, 1, 6, NULL, '2020-05-15 19:07:51', '2020-05-15 19:07:51'),
        (9, 1, 6, NULL, '2020-05-15 19:09:13', '2020-05-15 19:09:13'),
        (10, 1, 6, NULL, '2020-05-15 19:10:20', '2020-05-15 19:10:20'),
        (11, 1, 6, NULL, '2020-05-15 19:10:44', '2020-05-15 19:10:44'),
        (12, 1, 6, NULL, '2020-05-15 19:11:04', '2020-05-15 19:11:04'),
        (13, 1, 6, NULL, '2020-05-15 19:12:12', '2020-05-15 19:12:12'),
        (14, 1, 6, NULL, '2020-05-15 19:12:37', '2020-05-15 19:12:37'),
        (15, 1, 6, NULL, '2020-05-15 19:12:58', '2020-05-15 19:12:58'),
        (16, 1, 6, NULL, '2020-05-15 19:13:31', '2020-05-15 19:13:31'),
        (17, 1, 6, NULL, '2020-05-15 19:13:50', '2020-05-15 19:13:50'),
        (18, 1, 6, NULL, '2020-05-15 19:14:15', '2020-05-15 19:14:15'),
        (19, 1, 6, NULL, '2020-05-15 19:14:41', '2020-05-15 19:14:41'),
        (20, 1, 6, NULL, '2020-05-15 19:15:07', '2020-05-15 19:15:07'),
        (21, 1, 6, NULL, '2020-05-15 19:15:29', '2020-05-15 19:15:29'),
        (22, 1, 6, NULL, '2020-05-15 19:16:14', '2020-05-15 19:16:14'),
        (23, 1, 6, NULL, '2020-05-15 19:16:45', '2020-05-15 19:16:45'),
        (24, 1, 6, NULL, '2020-05-15 19:17:03', '2020-05-15 19:17:03'),
        (25, 1, 6, NULL, '2020-05-15 19:17:23', '2020-05-15 19:17:23'),
        (26, 1, 6, NULL, '2020-05-15 19:17:52', '2020-05-15 19:17:52'),
        (27, 1, 6, NULL, '2020-05-15 19:18:22', '2020-05-15 19:18:22'),
        (28, 1, 6, NULL, '2020-05-15 19:18:41', '2020-05-15 19:18:41'),
        (29, 1, 6, NULL, '2020-05-15 19:18:57', '2020-05-15 19:18:57'),
        (30, 1, 6, NULL, '2020-05-15 19:19:26', '2020-05-15 19:19:26'),
        (31, 1, 6, NULL, '2020-05-15 19:21:41', '2020-05-15 19:21:41'),
        (32, 1, 6, NULL, '2020-05-15 19:22:12', '2020-05-15 19:22:12'),
        (33, 1, 6, NULL, '2020-05-15 19:22:42', '2020-05-15 19:22:42'),
        (34, 1, 9, NULL, '2020-05-15 22:34:53', '2020-05-15 22:34:53'),
        (35, 1, 9, NULL, '2020-05-15 22:35:23', '2020-05-15 22:35:23'),
        (36, 1, 9, NULL, '2020-05-15 22:36:05', '2020-05-15 22:36:05'),
        (37, 1, 9, NULL, '2020-05-15 22:36:27', '2020-05-15 22:36:27'),
        (38, 1, 9, NULL, '2020-05-15 22:36:46', '2020-05-15 22:36:46'),
        (39, 1, 9, NULL, '2020-05-15 22:37:24', '2020-05-15 22:37:24'),
        (40, 1, 9, NULL, '2020-05-15 22:37:44', '2020-05-15 22:37:44'),
        (41, 1, 9, NULL, '2020-05-15 22:38:08', '2020-05-15 22:38:08'),
        (42, 1, 9, NULL, '2020-05-15 22:38:36', '2020-05-15 22:38:36'),
        (43, 1, 9, NULL, '2020-05-15 22:39:42', '2020-05-15 22:39:42'),
        (44, 1, 9, NULL, '2020-05-15 22:40:00', '2020-05-15 22:40:00'),
        (45, 1, 9, NULL, '2020-05-15 22:40:26', '2020-05-15 22:40:26'),
        (46, 1, 9, NULL, '2020-05-15 22:41:03', '2020-05-15 22:41:03'),
        (47, 1, 9, NULL, '2020-05-15 22:41:21', '2020-05-15 22:41:21'),
        (48, 1, 9, NULL, '2020-05-15 22:41:51', '2020-05-15 22:41:51'),
        (49, 1, 4, NULL, '2020-05-15 22:43:10', '2020-05-15 22:43:10'),
        (50, 1, 4, NULL, '2020-05-15 22:44:16', '2020-05-15 22:44:16'),
        (51, 1, 4, NULL, '2020-05-15 22:45:28', '2020-05-15 22:45:28'),
        (52, 1, 4, NULL, '2020-05-15 22:47:13', '2020-05-15 22:47:13'),
        (53, 1, 4, NULL, '2020-05-15 22:48:12', '2020-05-15 22:48:12'),
        (54, 1, 4, NULL, '2020-05-15 22:48:36', '2020-05-15 22:48:36'),
        (55, 1, 4, NULL, '2020-05-15 22:50:26', '2020-05-15 22:50:26'),
        (56, 1, 4, NULL, '2020-05-15 22:51:39', '2020-05-15 22:51:39'),
        (57, 1, 4, NULL, '2020-05-15 22:52:02', '2020-05-15 22:52:02'),
        (58, 1, 4, NULL, '2020-05-15 22:52:33', '2020-05-15 22:52:33'),
        (59, 1, 4, NULL, '2020-05-15 22:52:54', '2020-05-15 22:52:54'),
        (60, 1, 4, NULL, '2020-05-15 22:53:15', '2020-05-15 22:53:15'),
        (61, 1, 4, NULL, '2020-05-15 22:56:30', '2020-05-15 22:56:30'),
        (62, 1, 4, NULL, '2020-05-15 22:56:43', '2020-05-15 22:56:43'),
        (63, 1, 4, NULL, '2020-05-15 22:57:03', '2020-05-15 22:57:03'),
        (64, 1, 4, NULL, '2020-05-15 22:57:33', '2020-05-15 22:57:33'),
        (65, 1, 4, NULL, '2020-05-15 22:58:04', '2020-05-15 22:58:04'),
        (66, 1, 8, NULL, '2020-05-15 22:59:39', '2020-05-15 22:59:39'),
        (67, 1, 8, NULL, '2020-05-15 23:00:09', '2020-05-15 23:00:09'),
        (68, 1, 8, NULL, '2020-05-15 23:00:31', '2020-05-15 23:00:31'),
        (69, 1, 8, NULL, '2020-05-15 23:00:45', '2020-05-15 23:00:45'),
        (70, 1, 8, NULL, '2020-05-15 23:01:00', '2020-05-15 23:01:00'),
        (71, 1, 8, NULL, '2020-05-15 23:01:21', '2020-05-15 23:01:21'),
        (72, 1, 8, NULL, '2020-05-15 23:02:04', '2020-05-15 23:02:04'),
        (73, 1, 8, NULL, '2020-05-15 23:02:20', '2020-05-15 23:02:20'),
        (74, 1, 4, NULL, '2020-05-15 23:02:41', '2020-05-15 23:02:41'),
        (75, 1, 10, NULL, '2020-05-15 23:03:45', '2020-05-15 23:03:45'),
        (76, 1, 10, NULL, '2020-05-15 23:04:22', '2020-05-15 23:04:22'),
        (77, 1, 10, NULL, '2020-05-15 23:04:40', '2020-05-15 23:04:40'),
        (78, 1, 10, NULL, '2020-05-15 23:05:11', '2020-05-15 23:05:11'),
        (79, 1, 10, NULL, '2020-05-15 23:05:27', '2020-05-15 23:05:27'),
        (80, 1, 10, NULL, '2020-05-15 23:05:47', '2020-05-15 23:05:47'),
        (81, 1, 10, NULL, '2020-05-15 23:09:25', '2020-05-15 23:09:25'),
        (82, 1, 10, NULL, '2020-05-15 23:10:08', '2020-05-15 23:10:08'),
        (83, 1, 10, NULL, '2020-05-15 23:10:42', '2020-05-15 23:10:42'),
        (84, 1, 10, NULL, '2020-05-15 23:11:12', '2020-05-15 23:11:12'),
        (85, 1, 10, NULL, '2020-05-15 23:11:39', '2020-05-15 23:11:39'),
        (86, 1, 7, NULL, '2020-05-15 23:12:54', '2020-05-15 23:12:54'),
        (87, 1, 7, NULL, '2020-05-15 23:13:17', '2020-05-15 23:13:17'),
        (88, 1, 7, NULL, '2020-05-15 23:59:45', '2020-05-15 23:59:45'),
        (89, 1, 7, NULL, '2020-05-16 00:00:33', '2020-05-16 00:00:33'),
        (90, 1, 7, NULL, '2020-05-16 00:00:50', '2020-05-16 00:00:50'),
        (91, 1, 7, NULL, '2020-05-16 00:01:12', '2020-05-16 00:01:12'),
        (92, 1, 7, NULL, '2020-05-16 00:01:44', '2020-05-16 00:01:44'),
        (93, 1, 7, NULL, '2020-05-16 00:03:28', '2020-05-16 00:03:28'),
        (94, 1, 7, NULL, '2020-05-16 00:04:23', '2020-05-16 00:04:23'),
        (95, 1, 7, NULL, '2020-05-16 00:04:46', '2020-05-16 00:04:46'),
        (96, 1, 7, NULL, '2020-05-16 00:05:05', '2020-05-16 00:05:05'),
        (97, 1, 7, NULL, '2020-05-16 00:05:37', '2020-05-16 00:05:37'),
        (98, 1, 7, NULL, '2020-05-16 00:06:00', '2020-05-16 00:06:00'),
        (99, 1, 7, NULL, '2020-05-16 00:06:17', '2020-05-16 00:06:17'),
        (100, 1, 7, NULL, '2020-05-16 00:06:40', '2020-05-16 00:06:40');

        ";
        $this->insert($data);

        $data = "

        INSERT INTO `state_translations` (`id`, `title`, `slug`, `locale`, `state_id`, `created_at`, `updated_at`) VALUES
            (7, 'khaldiya', 'khaldiya', 'en', 4, '2020-05-15 19:05:38', '2020-05-15 19:05:38'),
            (8, 'الخالدية', 'الخالدية', 'ar', 4, '2020-05-15 19:05:38', '2020-05-15 19:44:47'),
            (9, 'al dasma', 'al-dasma', 'en', 5, '2020-05-15 19:06:15', '2020-05-15 19:06:15'),
            (10, 'الدسمة', 'الدسمة', 'ar', 5, '2020-05-15 19:06:15', '2020-05-15 19:06:15'),
            (11, 'al daiya', 'al-daiya', 'en', 6, '2020-05-15 19:06:53', '2020-05-15 19:06:53'),
            (12, 'الدعية', 'الدعية', 'ar', 6, '2020-05-15 19:06:53', '2020-05-15 19:06:53'),
            (13, 'Doha', 'doha', 'en', 7, '2020-05-15 19:07:24', '2020-05-15 19:07:24'),
            (14, 'الدوحة', 'الدوحة', 'ar', 7, '2020-05-15 19:07:24', '2020-05-15 19:07:24'),
            (15, 'Rawdah', 'rawdah', 'en', 8, '2020-05-15 19:07:51', '2020-05-15 19:07:51'),
            (16, 'الروضة', 'الروضة', 'ar', 8, '2020-05-15 19:07:51', '2020-05-15 19:07:51'),
            (17, 'Rai', 'rai', 'en', 9, '2020-05-15 19:09:13', '2020-05-15 19:09:13'),
            (18, 'الري', 'الري', 'ar', 9, '2020-05-15 19:09:13', '2020-05-15 19:09:13'),
            (19, 'surra', 'surra', 'en', 10, '2020-05-15 19:10:20', '2020-05-15 19:10:20'),
            (20, 'السرة', 'السرة', 'ar', 10, '2020-05-15 19:10:20', '2020-05-15 19:10:20'),
            (21, 'al shamiya', 'al-shamiya', 'en', 11, '2020-05-15 19:10:44', '2020-05-15 19:10:44'),
            (22, 'الشامية', 'الشامية', 'ar', 11, '2020-05-15 19:10:44', '2020-05-15 19:10:44'),
            (23, 'al shuwaikh', 'al-shuwaikh', 'en', 12, '2020-05-15 19:11:04', '2020-05-15 19:11:04'),
            (24, 'الشويخ', 'الشويخ', 'ar', 12, '2020-05-15 19:11:04', '2020-05-15 19:11:04'),
            (25, 'Sulaibikhat', 'sulaibikhat', 'en', 13, '2020-05-15 19:12:12', '2020-05-15 19:12:12'),
            (26, 'الصليبيخات', 'الصليبيخات', 'ar', 13, '2020-05-15 19:12:12', '2020-05-15 19:12:12'),
            (27, 'Sawābir', 'sawbir', 'en', 14, '2020-05-15 19:12:37', '2020-05-15 19:12:37'),
            (28, 'الصوابر', 'الصوابر', 'ar', 14, '2020-05-15 19:12:37', '2020-05-15 19:12:37'),
            (29, 'al adiliya', 'al-adiliya', 'en', 15, '2020-05-15 19:12:58', '2020-05-15 19:12:58'),
            (30, 'العديلية', 'العديلية', 'ar', 15, '2020-05-15 19:12:58', '2020-05-15 19:12:58'),
            (31, 'al faiha', 'al-faiha', 'en', 16, '2020-05-15 19:13:31', '2020-05-15 19:13:31'),
            (32, 'الفيحاء', 'الفيحاء', 'ar', 16, '2020-05-15 19:13:31', '2020-05-15 19:13:31'),
            (33, 'Qadsiya', 'qadsiya', 'en', 17, '2020-05-15 19:13:50', '2020-05-15 19:13:50'),
            (34, 'القادسية', 'القادسية', 'ar', 17, '2020-05-15 19:13:50', '2020-05-15 19:13:50'),
            (35, 'Qairawān', 'qairawn', 'en', 18, '2020-05-15 19:14:15', '2020-05-15 19:14:15'),
            (36, 'القيروان', 'القيروان', 'ar', 18, '2020-05-15 19:14:15', '2020-05-15 19:14:15'),
            (37, 'al murgab', 'al-murgab', 'en', 19, '2020-05-15 19:14:41', '2020-05-15 19:14:41'),
            (38, 'المرقاب', 'المرقاب', 'ar', 19, '2020-05-15 19:14:41', '2020-05-15 19:14:41'),
            (39, 'al mansouriah', 'al-mansouriah', 'en', 20, '2020-05-15 19:15:07', '2020-05-15 19:15:07'),
            (40, 'المنصورية', 'المنصورية', 'ar', 20, '2020-05-15 19:15:07', '2020-05-15 19:15:07'),
            (41, 'al Nuzha', 'al-nuzha', 'en', 21, '2020-05-15 19:15:30', '2020-05-15 19:15:30'),
            (42, 'النزهة', 'النزهة', 'ar', 21, '2020-05-15 19:15:30', '2020-05-15 19:15:30'),
            (43, 'Nahdha', 'nahdha', 'en', 22, '2020-05-15 19:16:14', '2020-05-15 19:16:14'),
            (44, 'النهضة', 'النهضة', 'ar', 22, '2020-05-15 19:16:14', '2020-05-15 19:16:14'),
            (45, 'Yarmūk', 'yarmk', 'en', 23, '2020-05-15 19:16:45', '2020-05-15 19:16:45'),
            (46, 'اليرموك', 'اليرموك', 'ar', 23, '2020-05-15 19:16:45', '2020-05-15 19:16:45'),
            (47, 'Bneid al Gar', 'bneid-al-gar', 'en', 24, '2020-05-15 19:17:03', '2020-05-15 19:17:03'),
            (48, 'بنيدالقار', 'بنيدالقار', 'ar', 24, '2020-05-15 19:17:03', '2020-05-15 19:17:03'),
            (49, 'dasman', 'dasman', 'en', 25, '2020-05-15 19:17:23', '2020-05-15 19:17:23'),
            (50, 'دسمان', 'دسمان', 'ar', 25, '2020-05-15 19:17:23', '2020-05-15 19:17:23'),
            (51, 'sharq', 'sharq', 'en', 26, '2020-05-15 19:17:52', '2020-05-15 19:17:52'),
            (52, 'شرق', 'شرق', 'ar', 26, '2020-05-15 19:17:52', '2020-05-15 19:17:52'),
            (53, 'Salhiya', 'salhiya', 'en', 27, '2020-05-15 19:18:22', '2020-05-15 19:18:22'),
            (54, 'صالحية', 'صالحية', 'ar', 27, '2020-05-15 19:18:22', '2020-05-15 19:18:22'),
            (55, 'abdullah al salem', 'abdullah-al-salem', 'en', 28, '2020-05-15 19:18:41', '2020-05-15 19:18:41'),
            (56, 'ضاحيه عبدالله السالم', 'ضاحيه-عبدالله-السالم', 'ar', 28, '2020-05-15 19:18:41', '2020-05-15 19:18:41'),
            (57, 'Ghirnata', 'ghirnata', 'en', 29, '2020-05-15 19:18:57', '2020-05-15 19:18:57'),
            (58, 'غرناطه', 'غرناطه', 'ar', 29, '2020-05-15 19:18:57', '2020-05-15 19:18:57'),
            (59, 'Jibla', 'jibla', 'en', 30, '2020-05-15 19:19:26', '2020-05-15 19:19:26'),
            (60, 'قبلة', 'قبلة', 'ar', 30, '2020-05-15 19:19:26', '2020-05-15 19:19:26'),
            (61, 'Qurtoba', 'qurtoba', 'en', 31, '2020-05-15 19:21:41', '2020-05-15 19:21:41'),
            (62, 'قرطبة', 'قرطبة', 'ar', 31, '2020-05-15 19:21:41', '2020-05-15 19:21:41'),
            (63, 'kaifan', 'kaifan', 'en', 32, '2020-05-15 19:22:12', '2020-05-15 19:22:12'),
            (64, 'كيفان', 'كيفان', 'ar', 32, '2020-05-15 19:22:12', '2020-05-15 19:22:12'),
            (65, 'Jabir al-Ahmad City', 'jabir-al-ahmad-city', 'en', 33, '2020-05-15 19:22:42', '2020-05-15 19:22:42'),
            (66, 'مدينه جابر الأحمد', 'مدينه-جابر-الأحمد', 'ar', 33, '2020-05-15 19:22:42', '2020-05-15 19:22:42'),
            (67, 'Anjafa', 'anjafa', 'en', 34, '2020-05-15 22:34:53', '2020-05-15 22:34:53'),
            (68, 'أنجفه', 'أنجفه', 'ar', 34, '2020-05-15 22:34:53', '2020-05-15 22:34:53'),
            (69, 'Al bidea', 'al-bidea', 'en', 35, '2020-05-15 22:35:23', '2020-05-15 22:35:23'),
            (70, 'البدع', 'البدع', 'ar', 35, '2020-05-15 22:35:23', '2020-05-15 22:35:23'),
            (71, 'Jabriya', 'jabriya', 'en', 36, '2020-05-15 22:36:05', '2020-05-15 22:36:05'),
            (72, 'الجابرية', 'الجابرية', 'ar', 36, '2020-05-15 22:36:05', '2020-05-15 22:36:05'),
            (73, 'Rumaithiya', 'rumaithiya', 'en', 37, '2020-05-15 22:36:27', '2020-05-15 22:36:27'),
            (74, 'الرميثية', 'الرميثية', 'ar', 37, '2020-05-15 22:36:27', '2020-05-15 22:36:27'),
            (75, 'Zahra', 'zahra', 'en', 38, '2020-05-15 22:36:46', '2020-05-15 22:36:46'),
            (76, 'الزهراء', 'الزهراء', 'ar', 38, '2020-05-15 22:36:46', '2020-05-15 22:36:46'),
            (77, 'Salmiya', 'salmiya', 'en', 39, '2020-05-15 22:37:24', '2020-05-15 22:37:24'),
            (78, 'السالمية', 'السالمية', 'ar', 39, '2020-05-15 22:37:24', '2020-05-15 22:37:24'),
            (79, 'Salam', 'salam', 'en', 40, '2020-05-15 22:37:44', '2020-05-15 22:37:44'),
            (80, 'السلام', 'السلام', 'ar', 40, '2020-05-15 22:37:44', '2020-05-15 22:37:44'),
            (81, 'Shaab', 'shaab', 'en', 41, '2020-05-15 22:38:08', '2020-05-15 22:38:08'),
            (82, 'الشعب', 'الشعب', 'ar', 41, '2020-05-15 22:38:08', '2020-05-15 22:38:08'),
            (83, 'Shuhada', 'shuhada', 'en', 42, '2020-05-15 22:38:36', '2020-05-15 22:38:36'),
            (84, 'الشهداء', 'الشهداء', 'ar', 42, '2020-05-15 22:38:36', '2020-05-15 22:38:36'),
            (85, 'Bayan', 'bayan', 'en', 43, '2020-05-15 22:39:42', '2020-05-15 22:39:42'),
            (86, 'بيان', 'بيان', 'ar', 43, '2020-05-15 22:39:42', '2020-05-15 22:39:42'),
            (87, 'Hateen', 'hateen', 'en', 44, '2020-05-15 22:40:00', '2020-05-15 22:40:00'),
            (88, 'حطين', 'حطين', 'ar', 44, '2020-05-15 22:40:00', '2020-05-15 22:40:00'),
            (89, 'Salwa', 'salwa', 'en', 45, '2020-05-15 22:40:26', '2020-05-15 22:40:26'),
            (90, 'سلوى', 'سلوى', 'ar', 45, '2020-05-15 22:40:26', '2020-05-15 22:40:26'),
            (91, 'Mubarak al abdullah', 'mubarak-al-abdullah', 'en', 46, '2020-05-15 22:41:03', '2020-05-15 22:41:03'),
            (92, 'مبارك العبدالله', 'مبارك-العبدالله', 'ar', 46, '2020-05-15 22:41:03', '2020-05-15 22:41:03'),
            (93, 'Mishrif', 'mishrif', 'en', 47, '2020-05-15 22:41:21', '2020-05-15 22:41:21'),
            (94, 'مشرف', 'مشرف', 'ar', 47, '2020-05-15 22:41:21', '2020-05-15 22:41:21'),
            (95, 'maidan hawally', 'maidan-hawally', 'en', 48, '2020-05-15 22:41:51', '2020-05-15 22:41:51'),
            (96, 'ميدان حولي', 'ميدان-حولي', 'ar', 48, '2020-05-15 22:41:51', '2020-05-15 22:41:51'),
            (97, 'Abraq  khaitan', 'abraq-khaitan', 'en', 49, '2020-05-15 22:43:10', '2020-05-15 22:43:10'),
            (98, 'أبرق خيطان', 'أبرق-خيطان', 'ar', 49, '2020-05-15 22:43:10', '2020-05-15 22:43:10'),
            (99, 'Ishbiliya', 'ishbiliya', 'en', 50, '2020-05-15 22:44:16', '2020-05-15 22:44:16'),
            (100, 'أشبيلية', 'أشبيلية', 'ar', 50, '2020-05-15 22:44:16', '2020-05-15 22:44:16'),
            (101, 'Al Andalous', 'al-andalous', 'en', 51, '2020-05-15 22:45:28', '2020-05-15 22:45:28'),
            (102, 'الأندلس', 'الأندلس', 'ar', 51, '2020-05-15 22:45:28', '2020-05-15 22:45:28'),
            (103, 'Rabia', 'rabia', 'en', 52, '2020-05-15 22:47:13', '2020-05-15 22:47:13'),
            (104, 'الرابية', 'الرابية', 'ar', 52, '2020-05-15 22:47:13', '2020-05-15 22:47:13'),
            (105, 'Rehab', 'rehab', 'en', 53, '2020-05-15 22:48:12', '2020-05-15 22:48:12'),
            (106, 'الرحاب', 'الرحاب', 'ar', 53, '2020-05-15 22:48:12', '2020-05-15 22:48:12'),
            (107, 'Rigai', 'rigai', 'en', 54, '2020-05-15 22:48:36', '2020-05-15 22:48:36'),
            (108, 'الرقعي', 'الرقعي', 'ar', 54, '2020-05-15 22:48:36', '2020-05-15 22:48:36'),
            (109, 'Al ashadadiya', 'al-ashadadiya', 'en', 55, '2020-05-15 22:50:26', '2020-05-15 22:50:26'),
            (110, 'الأشدادية', 'الأشدادية', 'ar', 55, '2020-05-15 22:50:26', '2020-05-15 22:50:26'),
            (111, 'Al dajeej', 'al-dajeej', 'en', 56, '2020-05-15 22:51:39', '2020-05-15 22:51:39'),
            (112, 'الضجيج', 'الضجيج', 'ar', 56, '2020-05-15 22:51:39', '2020-05-15 22:51:39'),
            (113, 'Ardiya', 'ardiya', 'en', 57, '2020-05-15 22:52:02', '2020-05-15 22:52:02'),
            (114, 'العارضية', 'العارضية', 'ar', 57, '2020-05-15 22:52:02', '2020-05-15 22:52:02'),
            (115, 'Ardiya small industrial', 'ardiya-small-industrial', 'en', 58, '2020-05-15 22:52:33', '2020-05-15 22:52:33'),
            (116, 'العارضيه الصناعيه', 'العارضيه-الصناعيه', 'ar', 58, '2020-05-15 22:52:33', '2020-05-15 22:52:33'),
            (117, 'Omariya', 'omariya', 'en', 59, '2020-05-15 22:52:54', '2020-05-15 22:52:54'),
            (118, 'العميري', 'العميري', 'ar', 59, '2020-05-15 22:52:54', '2020-05-15 22:52:54'),
            (119, 'Firdous', 'firdous', 'en', 60, '2020-05-15 22:53:15', '2020-05-15 22:53:15'),
            (120, 'الفردوس', 'الفردوس', 'ar', 60, '2020-05-15 22:53:15', '2020-05-15 22:53:15'),
            (121, 'Farwaniyah', 'farwaniyah', 'en', 61, '2020-05-15 22:56:30', '2020-05-15 22:56:30'),
            (122, 'الفروانية', 'الفروانية', 'ar', 61, '2020-05-15 22:56:30', '2020-05-15 22:56:30'),
            (123, 'Jaleel al shuyoukh', 'jaleel-al-shuyoukh', 'en', 62, '2020-05-15 22:56:43', '2020-05-15 22:56:43'),
            (124, 'جليب الشيوخ', 'جليب-الشيوخ', 'ar', 62, '2020-05-15 22:56:43', '2020-05-15 22:56:43'),
            (125, 'Khaitan', 'khaitan', 'en', 63, '2020-05-15 22:57:03', '2020-05-15 22:57:03'),
            (126, 'خيطان', 'خيطان', 'ar', 63, '2020-05-15 22:57:03', '2020-05-15 22:57:03'),
            (127, 'Sabah al nasser', 'sabah-al-nasser', 'en', 64, '2020-05-15 22:57:33', '2020-05-15 22:57:33'),
            (128, 'صباح الناصر', 'صباح-الناصر', 'ar', 64, '2020-05-15 22:57:33', '2020-05-15 22:57:33'),
            (129, 'Abbasiya', 'abbasiya', 'en', 65, '2020-05-15 22:58:04', '2020-05-15 22:58:04'),
            (130, 'عباسية', 'عباسية', 'ar', 65, '2020-05-15 22:58:04', '2020-05-15 22:58:04'),
            (131, 'jahra', 'jahra', 'en', 66, '2020-05-15 22:59:39', '2020-05-15 22:59:39'),
            (132, 'الجهراء', 'الجهراء', 'ar', 66, '2020-05-15 22:59:39', '2020-05-15 22:59:39'),
            (133, 'sulabiya', 'sulabiya', 'en', 67, '2020-05-15 23:00:09', '2020-05-15 23:00:09'),
            (134, 'الصليبية', 'الصليبية', 'ar', 67, '2020-05-15 23:00:09', '2020-05-15 23:00:09'),
            (135, 'oyoun', 'oyoun', 'en', 68, '2020-05-15 23:00:31', '2020-05-15 23:00:31'),
            (136, 'العيون', 'العيون', 'ar', 68, '2020-05-15 23:00:31', '2020-05-15 23:00:31'),
            (137, 'qasr', 'qasr', 'en', 69, '2020-05-15 23:00:45', '2020-05-15 23:00:45'),
            (138, 'القصر', 'القصر', 'ar', 69, '2020-05-15 23:00:45', '2020-05-15 23:00:45'),
            (139, 'naseem', 'naseem', 'en', 70, '2020-05-15 23:01:00', '2020-05-15 23:01:00'),
            (140, 'النسيم', 'النسيم', 'ar', 70, '2020-05-15 23:01:00', '2020-05-15 23:01:00'),
            (141, 'Alnayam', 'alnayam', 'en', 71, '2020-05-15 23:01:21', '2020-05-15 23:01:21'),
            (142, 'النعيم', 'النعيم', 'ar', 71, '2020-05-15 23:01:21', '2020-05-15 23:01:21'),
            (143, 'Al waha', 'al-waha', 'en', 72, '2020-05-15 23:02:04', '2020-05-15 23:02:04'),
            (144, 'الواحة', 'الواحة', 'ar', 72, '2020-05-15 23:02:04', '2020-05-15 23:02:04'),
            (145, 'taima', 'taima', 'en', 73, '2020-05-15 23:02:20', '2020-05-15 23:02:20'),
            (146, 'تيماء', 'تيماء', 'ar', 73, '2020-05-15 23:02:20', '2020-05-15 23:02:20'),
            (147, 'saad al abdullah', 'saad-al-abdullah', 'en', 74, '2020-05-15 23:02:41', '2020-05-15 23:02:41'),
            (148, 'سعد العبدالله', 'سعد-العبدالله', 'ar', 74, '2020-05-15 23:02:41', '2020-05-15 23:02:41'),
            (149, 'abu al hasaniya', 'abu-al-hasaniya', 'en', 75, '2020-05-15 23:03:45', '2020-05-15 23:03:45'),
            (150, 'أبو الحصانية', 'أبو-الحصانية', 'ar', 75, '2020-05-15 23:03:45', '2020-05-15 23:03:45'),
            (151, 'AbuFteira', 'abufteira', 'en', 76, '2020-05-15 23:04:22', '2020-05-15 23:04:22'),
            (152, 'أبو فطيرة', 'أبو-فطيرة', 'ar', 76, '2020-05-15 23:04:22', '2020-05-15 23:04:22'),
            (153, 'Adan', 'adan', 'en', 77, '2020-05-15 23:04:40', '2020-05-15 23:04:40'),
            (154, 'عدان', 'عدان', 'ar', 77, '2020-05-15 23:04:40', '2020-05-15 23:04:40'),
            (155, 'Qurain', 'qurain', 'en', 78, '2020-05-15 23:05:11', '2020-05-15 23:05:11'),
            (156, 'القرين', 'القرين', 'ar', 78, '2020-05-15 23:05:11', '2020-05-15 23:05:11'),
            (157, 'Qusūr', 'qusr', 'en', 79, '2020-05-15 23:05:27', '2020-05-15 23:05:27'),
            (158, 'القصور', 'القصور', 'ar', 79, '2020-05-15 23:05:27', '2020-05-15 23:05:27'),
            (159, 'al masayel', 'al-masayel', 'en', 80, '2020-05-15 23:05:47', '2020-05-15 23:05:47'),
            (160, 'المسايل', 'المسايل', 'ar', 80, '2020-05-15 23:05:47', '2020-05-15 23:05:47'),
            (161, 'Misaila', 'misaila', 'en', 81, '2020-05-15 23:09:25', '2020-05-15 23:09:25'),
            (162, 'المسيلة', 'المسيلة', 'ar', 81, '2020-05-15 23:09:25', '2020-05-15 23:09:25'),
            (163, 'Sabah as-Salim', 'sabah-as-salim', 'en', 82, '2020-05-15 23:10:08', '2020-05-15 23:10:08'),
            (164, 'صباح السالم', 'صباح-السالم', 'ar', 82, '2020-05-15 23:10:08', '2020-05-15 23:10:08'),
            (165, 'Sabhan', 'sabhan', 'en', 83, '2020-05-15 23:10:42', '2020-05-15 23:10:42'),
            (166, 'صبحان', 'صبحان', 'ar', 83, '2020-05-15 23:10:42', '2020-05-15 23:10:42'),
            (167, 'Funaitīs', 'funaits', 'en', 84, '2020-05-15 23:11:12', '2020-05-15 23:11:12'),
            (168, 'فنيطيس', 'فنيطيس', 'ar', 84, '2020-05-15 23:11:12', '2020-05-15 23:11:12'),
            (169, 'Mubarak al-Kabeer', 'mubarak-al-kabeer', 'en', 85, '2020-05-15 23:11:39', '2020-05-15 23:11:39'),
            (170, 'مبارك الكبير', 'مبارك-الكبير', 'ar', 85, '2020-05-15 23:11:39', '2020-05-15 23:11:39'),
            (171, 'Abu Hulaifa', 'abu-hulaifa', 'en', 86, '2020-05-15 23:12:54', '2020-05-15 23:12:54'),
            (172, 'أبو حليفة', 'أبو-حليفة', 'ar', 86, '2020-05-15 23:12:54', '2020-05-15 23:12:54'),
            (173, 'Ahmadi', 'ahmadi', 'en', 87, '2020-05-15 23:13:17', '2020-05-15 23:13:17'),
            (174, 'الأحمدي', 'الأحمدي', 'ar', 87, '2020-05-15 23:13:17', '2020-05-15 23:13:17'),
            (175, 'Rigga', 'rigga', 'en', 88, '2020-05-15 23:59:45', '2020-05-15 23:59:45'),
            (176, 'الرقه', 'الرقه', 'ar', 88, '2020-05-15 23:59:45', '2020-05-15 23:59:45'),
            (177, 'Alsbahya', 'alsbahya', 'en', 89, '2020-05-16 00:00:33', '2020-05-16 00:00:33'),
            (178, 'الصباحية', 'الصباحية', 'ar', 89, '2020-05-16 00:00:33', '2020-05-16 00:00:33'),
            (179, 'dahar', 'dahar', 'en', 90, '2020-05-16 00:00:50', '2020-05-16 00:00:50'),
            (180, 'الظهر', 'الظهر', 'ar', 90, '2020-05-16 00:00:50', '2020-05-16 00:00:50'),
            (181, 'Aqila', 'aqila', 'en', 91, '2020-05-16 00:01:12', '2020-05-16 00:01:12'),
            (182, 'العقيلة', 'العقيلة', 'ar', 91, '2020-05-16 00:01:12', '2020-05-16 00:01:12'),
            (183, 'Fahaheel', 'fahaheel', 'en', 92, '2020-05-16 00:01:44', '2020-05-16 00:01:44'),
            (184, 'الفحيحيل', 'الفحيحيل', 'ar', 92, '2020-05-16 00:01:44', '2020-05-16 00:01:44'),
            (185, 'alfintas', 'alfintas', 'en', 93, '2020-05-16 00:03:28', '2020-05-16 00:03:28'),
            (186, 'الفنطاس', 'الفنطاس', 'ar', 93, '2020-05-16 00:03:28', '2020-05-16 00:03:28'),
            (187, 'Mangaf', 'mangaf', 'en', 94, '2020-05-16 00:04:23', '2020-05-16 00:04:23'),
            (188, 'المنقف', 'المنقف', 'ar', 94, '2020-05-16 00:04:23', '2020-05-16 00:04:23'),
            (189, 'Mahbula', 'mahbula', 'en', 95, '2020-05-16 00:04:46', '2020-05-16 00:04:46'),
            (190, 'المهبولة', 'المهبولة', 'ar', 95, '2020-05-16 00:04:46', '2020-05-16 00:04:46'),
            (191, 'Jabir al-Ali', 'jabir-al-ali', 'en', 96, '2020-05-16 00:05:05', '2020-05-16 00:05:05'),
            (192, 'جابر العلي', 'جابر-العلي', 'ar', 96, '2020-05-16 00:05:05', '2020-05-16 00:05:05'),
            (193, 'Ali sabah al salem', 'ali-sabah-al-salem', 'en', 97, '2020-05-16 00:05:37', '2020-05-16 00:05:37'),
            (194, 'علي صباح  السالم', 'علي-صباح-السالم', 'ar', 97, '2020-05-16 00:05:37', '2020-05-16 00:05:37'),
            (195, 'Fahd al-Ahmad', 'fahd-al-ahmad', 'en', 98, '2020-05-16 00:06:00', '2020-05-16 00:06:00'),
            (196, 'فهد الأحمد', 'فهد-الأحمد', 'ar', 98, '2020-05-16 00:06:00', '2020-05-16 00:06:00'),
            (197, 'Sabah al-Ahmad City', 'sabah-al-ahmad-city', 'en', 99, '2020-05-16 00:06:17', '2020-05-16 00:06:17'),
            (198, 'مدينه صباح الأحمد', 'مدينه-صباح-الأحمد', 'ar', 99, '2020-05-16 00:06:17', '2020-05-16 00:06:17'),
            (199, 'Hadiya', 'hadiya', 'en', 100, '2020-05-16 00:06:40', '2020-05-16 00:06:40'),
            (200, 'هدية', 'هدية', 'ar', 100, '2020-05-16 00:06:40', '2020-05-16 00:06:40');
        ";
        $this->insert($data);
    }
}
