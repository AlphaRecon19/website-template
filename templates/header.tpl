{assign var='title' value=$title|default:''}<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang=""><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{$title}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css">
    {if $_settings_ENVIRONMENT != 'dev'}
    <link rel="stylesheet" href="{php}echo cdn::asset_url("css/main.min.css");{/php}">{else}<link rel="stylesheet" href="{php}echo cdn::asset_url("css/main.css");{/php}">
    <link rel="stylesheet" href="{php}echo cdn::asset_url("css/desktop.css");{/php}">
    <link rel="stylesheet" href="{php}echo cdn::asset_url("css/992.css");{/php}">
    <link rel="stylesheet" href="{php}echo cdn::asset_url("css/768.css");{/php}">{/if}
</head>
<body>
{include file="navbar.tpl"}
<!-- Begin page content -->
    <div class="container container-hidden">
<!-- EOF header.tpl  -->
