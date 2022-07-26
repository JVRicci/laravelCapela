-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jul-2022 às 22:18
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancocapela`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `catequistas`
--

CREATE TABLE `catequistas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idContato` bigint(20) UNSIGNED NOT NULL,
  `idEndereco` bigint(20) UNSIGNED NOT NULL,
  `idTurma` int(11) DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `ativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `catequistas`
--

INSERT INTO `catequistas` (`id`, `idContato`, `idEndereco`, `idTurma`, `nome`, `nascimento`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 0, 'Ana Maria de Souza', '1998-02-20', 'Ativo', '2022-07-21 20:14:47', '2022-07-21 20:14:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `catequizandos`
--

CREATE TABLE `catequizandos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idContato` bigint(20) UNSIGNED NOT NULL,
  `idEndereco` bigint(20) UNSIGNED NOT NULL,
  `idResponsavel` bigint(20) UNSIGNED NOT NULL,
  `idTurma` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `faltas` int(11) DEFAULT NULL,
  `ativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faltaEncontro` int(11) DEFAULT NULL,
  `faltaMissa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `catequizandos`
--

INSERT INTO `catequizandos` (`id`, `idContato`, `idEndereco`, `idResponsavel`, `idTurma`, `nome`, `nascimento`, `faltas`, `ativo`, `turma`, `faltaEncontro`, `faltaMissa`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 2, 'Janaina', '2022-02-02', 0, 'Ativo', '0', 1, 0, '2022-07-21 19:44:59', '2022-07-26 23:11:08'),
(2, 5, 5, 3, 2, 'Matheus', '1999-07-25', NULL, 'Ativo', '0', 1, 0, '2022-07-25 21:10:51', '2022-07-26 23:09:39'),
(3, 6, 6, 4, 1, 'Ana Maria de Souza', '2222-02-20', 0, 'Ativo', '0', 2, 0, '2022-07-25 23:08:49', '2022-07-26 23:01:48'),
(4, 7, 7, 5, 2, 'Larissa Chaves', '2005-01-02', 0, 'Ativo', '0', 0, 0, '2022-07-26 23:05:57', '2022-07-26 23:06:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fornecedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vencimento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsavel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagamento` date NOT NULL,
  `formaPagamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `telefone`, `celular`, `email`, `created_at`, `updated_at`) VALUES
(1, '(17)9887-7665', '(17)98877-665', 'anamaria@gmail.com', '2022-07-21 19:44:17', '2022-07-21 19:44:17'),
(2, '(17)9887-7665', '(17)98877-665', 'anamaria@gmail.com', '2022-07-21 19:44:59', '2022-07-21 19:44:59'),
(3, '(17)9887-7665', '(17)98877-665', 'anamaria@gmail.com', '2022-07-21 20:14:47', '2022-07-21 20:14:47'),
(4, '(17)9887-7665', '(17)98877-665', 'anamaria@gmail.com', '2022-07-21 20:57:44', '2022-07-21 20:57:44'),
(5, '(17)9887-7665', '(11)11112-2222', 'anamaria@gmail.com', '2022-07-25 21:10:51', '2022-07-25 21:10:51'),
(6, '(17)9887-7665', '(17)98877-665', 'anamaria@gmail.com', '2022-07-25 23:08:49', '2022-07-25 23:08:49'),
(7, '(17)9887-7665', '(17)98877-665', 'anamaria@gmail.com', '2022-07-26 23:05:57', '2022-07-26 23:05:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dizimistas`
--

CREATE TABLE `dizimistas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idContato` bigint(20) UNSIGNED NOT NULL,
  `idEndereco` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoCivil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoCasamento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conjuge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conjugeNascimento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dizimistas`
--

INSERT INTO `dizimistas` (`id`, `idContato`, `idEndereco`, `nome`, `nascimento`, `cpf`, `estadoCivil`, `tipoCasamento`, `conjuge`, `conjugeNascimento`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'Ana Maria de Souza', '1998-11-05', '111.222.333-44', 'casado', 'igreja', 'James Aparecido Riccii', '1234-02-02', 'Ativo', '2022-07-21 20:57:44', '2022-07-21 20:57:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dizimos`
--

CREATE TABLE `dizimos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idDizimista` bigint(20) UNSIGNED NOT NULL,
  `qtdRecebida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataRecebimento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dizimos`
--

INSERT INTO `dizimos` (`id`, `idDizimista`, `qtdRecebida`, `dataRecebimento`, `created_at`, `updated_at`) VALUES
(1, 1, '20', '2022-07-21', '2022-07-21 20:57:54', '2022-07-21 20:57:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idDoador` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataRecebimento` date NOT NULL,
  `tipoDoacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `doacoes`
--

INSERT INTO `doacoes` (`id`, `idDoador`, `descricao`, `destino`, `dataRecebimento`, `tipoDoacao`, `created_at`, `updated_at`) VALUES
(1, 1, 'Site Capela', 'Comunidade', '2022-07-21', 'Material', '2022-07-21 20:57:03', '2022-07-21 20:57:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doadores`
--

CREATE TABLE `doadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `doadores`
--

INSERT INTO `doadores` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'João', '2022-07-21 20:56:35', '2022-07-21 20:56:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encontros`
--

CREATE TABLE `encontros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idTurma` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `encontros`
--

INSERT INTO `encontros` (`id`, `idTurma`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 2, 'Primeiro encontro do ano', '2022-07-26 23:09:39', '2022-07-26 23:09:39'),
(2, 2, 'Segundo encontro do ano', '2022-07-26 23:11:08', '2022-07-26 23:11:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `endereco` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `endereco`, `cep`, `numero`, `cidade`, `bairro`, `uf`, `created_at`, `updated_at`) VALUES
(1, 'Rua 25 de Outubro', '14787-255', '20', 'Barretos', 'Derby Club', 'SP', '2022-07-21 19:44:17', '2022-07-21 19:44:17'),
(2, 'Rua 25 de Outubro', '14787-255', '20', 'Barretos', 'Derby Club', 'SP', '2022-07-21 19:44:59', '2022-07-21 19:44:59'),
(3, 'Rua 25 de Outubro', '14787-255', '20', 'Barretos', 'Derby Club', 'SP', '2022-07-21 20:14:47', '2022-07-21 20:14:47'),
(4, 'Rua 25 de Outubro', '14787-255', '20', 'Barretos', 'Derby Club', 'SP', '2022-07-21 20:57:44', '2022-07-21 20:57:44'),
(5, 'Alameda Indonésia', '14755-555', '36', 'Barretos', 'Califórnia', 'SP', '2022-07-25 21:10:51', '2022-07-25 21:10:51'),
(6, 'Rua 25 de Outubru', '14787-255', '35', 'Barretos', 'Derby Club', 'SP', '2022-07-25 23:08:49', '2022-07-25 23:08:49'),
(7, 'Alameda Indonésia', '14787-255', '20', 'Barretos', 'Derby Club', 'SP', '2022-07-26 23:05:57', '2022-07-26 23:05:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idResponsavel` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `idResponsavel`, `nome`, `data`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 1, 'Festa de São João', '2022-08-30', 'Festa oitunina de São João', '2022-07-22 18:10:23', '2022-07-22 18:10:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faltas`
--

CREATE TABLE `faltas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ifFalta` int(11) DEFAULT NULL,
  `faltasCatequese` int(11) DEFAULT NULL,
  `faltasMissa` int(11) DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_07_11_174203_create_endereco', 1),
(7, '2022_07_11_174259_create_contato', 1),
(8, '2022_07_11_174547_create_dizimista', 1),
(9, '2022_07_12_193526_create_dizimos', 1),
(10, '2022_07_13_125534_create_doadores', 1),
(11, '2022_07_13_133622_create_doacoes', 1),
(12, '2022_07_13_192510_create_contas', 1),
(13, '2022_07_14_140531_create_sessions_table', 1),
(14, '2022_07_19_183904_create_responsavel', 1),
(15, '2022_07_20_122234_create_faltas', 1),
(16, '2022_07_20_122742_create_turmas', 1),
(17, '2022_07_20_124606_create_catequista', 1),
(18, '2022_07_20_125554_create_catequizandos', 1),
(19, '2022_07_22_142451_create_eventos', 2),
(20, '2022_07_26_125823_create_encontros', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavels`
--

CREATE TABLE `responsavels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responsavel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascResponsavel` date NOT NULL,
  `estadoCivil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoCasamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `padrinho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madrinha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `responsavels`
--

INSERT INTO `responsavels` (`id`, `responsavel`, `nascResponsavel`, `estadoCivil`, `tipoCasamento`, `padrinho`, `madrinha`, `created_at`, `updated_at`) VALUES
(1, 'Eliseu', '2010-01-01', 'igreja', 'igreja', 'Teste', 'Testa', '2022-07-21 19:44:17', '2022-07-21 19:44:17'),
(2, 'Eliseu', '2010-01-01', 'igreja', 'igreja', 'Teste', 'Testa', '2022-07-21 19:44:59', '2022-07-21 19:44:59'),
(3, 'James', '1989-07-25', 'igreja', 'igreja', 'Eliseu', 'Eliane', '2022-07-25 21:10:51', '2022-07-25 21:10:51'),
(4, 'James', '0222-02-22', 'ambos', 'ambos', 'Jagunço', 'Lampiona', '2022-07-25 23:08:49', '2022-07-25 23:08:49'),
(5, 'Manoel Chaves', '1968-06-05', 'igreja', 'igreja', 'Eliseu', 'Lampiona', '2022-07-26 23:05:57', '2022-07-26 23:05:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('J51AeJON5cyPRfjgBAYlhzGFmTzJI0eFyP6jA8PH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.115 Safari/537.36 OPR/88.0.4412.85 (Edition std-1)', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiemREUGlXN0FydUpLaXQwTjJ6RnZ1a1dPMndUSjd4eW56UmE4UnFKUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb25zLXR1cm1hL2lkPTIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGhFRVF2WC82dGZtRExPRW5wbzd2MGV5Lm9YQWkuMWNXTHladjg0VVJweS5OOTE2cWEzVFcuIjt9', 1658866268);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCatequista` int(11) NOT NULL,
  `diaEncontro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `idCatequista`, `diaEncontro`, `formacao`, `created_at`, `updated_at`) VALUES
(1, 1, 'Domingo', 'Ano 1', '2022-07-21 21:39:29', '2022-07-21 21:39:29'),
(2, 1, 'Segunda-Feira', 'Ano 4', '2022-07-26 23:06:17', '2022-07-26 23:06:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'jvricci', 'jvricci99@gmail.com', NULL, '$2y$10$hEEQvX/6tfmDLOEnpo7v0ey.oXAi.1cWLyZv84URpy.N916qa3TW.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 19:42:42', '2022-07-21 19:42:42');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `catequistas`
--
ALTER TABLE `catequistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catequistas_idcontato_foreign` (`idContato`),
  ADD KEY `catequistas_idendereco_foreign` (`idEndereco`);

--
-- Índices para tabela `catequizandos`
--
ALTER TABLE `catequizandos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catequizandos_idcontato_foreign` (`idContato`),
  ADD KEY `catequizandos_idendereco_foreign` (`idEndereco`),
  ADD KEY `catequizandos_idresponsavel_foreign` (`idResponsavel`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dizimistas`
--
ALTER TABLE `dizimistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dizimistas_idcontato_foreign` (`idContato`),
  ADD KEY `dizimistas_idendereco_foreign` (`idEndereco`);

--
-- Índices para tabela `dizimos`
--
ALTER TABLE `dizimos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dizimos_iddizimista_foreign` (`idDizimista`);

--
-- Índices para tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doacoes_iddoador_foreign` (`idDoador`);

--
-- Índices para tabela `doadores`
--
ALTER TABLE `doadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `encontros`
--
ALTER TABLE `encontros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encontros_idturma_foreign` (`idTurma`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventos_idresponsavel_foreign` (`idResponsavel`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `responsavels`
--
ALTER TABLE `responsavels`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `catequistas`
--
ALTER TABLE `catequistas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `catequizandos`
--
ALTER TABLE `catequizandos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `dizimistas`
--
ALTER TABLE `dizimistas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dizimos`
--
ALTER TABLE `dizimos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `doadores`
--
ALTER TABLE `doadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `encontros`
--
ALTER TABLE `encontros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `responsavels`
--
ALTER TABLE `responsavels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `catequistas`
--
ALTER TABLE `catequistas`
  ADD CONSTRAINT `catequistas_idcontato_foreign` FOREIGN KEY (`idContato`) REFERENCES `contatos` (`id`),
  ADD CONSTRAINT `catequistas_idendereco_foreign` FOREIGN KEY (`idEndereco`) REFERENCES `enderecos` (`id`);

--
-- Limitadores para a tabela `catequizandos`
--
ALTER TABLE `catequizandos`
  ADD CONSTRAINT `catequizandos_idcontato_foreign` FOREIGN KEY (`idContato`) REFERENCES `contatos` (`id`),
  ADD CONSTRAINT `catequizandos_idendereco_foreign` FOREIGN KEY (`idEndereco`) REFERENCES `enderecos` (`id`),
  ADD CONSTRAINT `catequizandos_idresponsavel_foreign` FOREIGN KEY (`idResponsavel`) REFERENCES `responsavels` (`id`);

--
-- Limitadores para a tabela `dizimistas`
--
ALTER TABLE `dizimistas`
  ADD CONSTRAINT `dizimistas_idcontato_foreign` FOREIGN KEY (`idContato`) REFERENCES `contatos` (`id`),
  ADD CONSTRAINT `dizimistas_idendereco_foreign` FOREIGN KEY (`idEndereco`) REFERENCES `enderecos` (`id`);

--
-- Limitadores para a tabela `dizimos`
--
ALTER TABLE `dizimos`
  ADD CONSTRAINT `dizimos_iddizimista_foreign` FOREIGN KEY (`idDizimista`) REFERENCES `dizimistas` (`id`);

--
-- Limitadores para a tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD CONSTRAINT `doacoes_iddoador_foreign` FOREIGN KEY (`idDoador`) REFERENCES `doadores` (`id`);

--
-- Limitadores para a tabela `encontros`
--
ALTER TABLE `encontros`
  ADD CONSTRAINT `encontros_idturma_foreign` FOREIGN KEY (`idTurma`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_idresponsavel_foreign` FOREIGN KEY (`idResponsavel`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
