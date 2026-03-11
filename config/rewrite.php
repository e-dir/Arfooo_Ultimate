<?php
/**
 * Arfooo
 * 
 * @package    Arfooo
 * @copyright  Copyright (c) Arfooo Annuaire (fr) and Arfooo Directory (en)
 *             by Guillaume Hocine (c) 2007 - 2010
 *             http://www.arfooo.com/ (fr) and http://www.arfooo.net/ (en)
 * @author     Guillaume Hocine & Adrian Galewski
 * @license    http://creativecommons.org/licenses/by/2.0/fr/ Creative Commons
 */

$rewrites = array(
// TOP- PAGES
'#^/top-notes/$#' => '/site/topNotes',
'#^/top-hits/$#' => '/site/topHits',
'#^/top-referrers/$#' => '/site/topReferrers', 
'#^/top-rank/$#' => '/site/topRank',
'#^/top-rank-([0-9]+)/$#' => '/site/topRank/\1',

// WEBMASTER PAGES
'#^/webmaster-submit-website/$#' => '/webmaster/submitWebsite',
'#^/webmaster-login/$#' => '/webmaster/logIn',
'#^/webmaster-lost-password/$#' => '/webmaster/lostPassword',
'#^/webmaster-change-password/$#' => '/webmaster/changePassword',
'#^/webmaster-management/$#' => '/webmaster/manage',
'#^/webmaster-logoff/$#' => '/webmaster/logoff',
'#^/webmaster-delete-site-([0-9]+)/$#' => '/webmaster/deleteSite/\1',
'#^/webmaster-edit-site-([0-9]+)/$#' => '/webmaster/editSite/\1',

// SITE DETAILS PAGE
'#^/(.*)-s([0-9]+)/$#' => '/site/details/\2/\1',

// INDEX PAGE
'#^/index/$#' => '/index.php',

// CONTACT FORM
'#^/contact/$#' => '/contact',

// NEWS PAGE
'#^/nouveautes/$#' => '/site/news',

// ALL CATEGORIES PAGE
'#^/allcategories/$#' => '/category/showAll',

// RSS FLUX NEWS
'#^/rss-nouveautes.xml$#' => '/rss/news',

// RSS FLUX CATEGORY
'#^/rss-c([0-9]+).xml$#' => '/rss/category/\1',

// RSS FLUX Site
'#^/rss-s([0-9]+).xml$#' => '/rss/site/\1',

// VOTE FORM
'#^/vote_s([0-9]+)/$#' => '/vote/popup/\1',

// COMMENT FORM
'#^/comment_s([0-9]+)/$#' => '/comment/popup/\1',

// PROBLEM REPORTING FORM
'#^/problem_reporting_s([0-9]+)/$#' => '/site/problemPopup/\1',

// KEYWORDS
'#^/mots-([A-Z0-9])/$#' => '/keyword/show/\1',
'#^/mots-(.*)-m([0-9]+)-p([0-9]+)/$#' => '/site/keyword/\2/\1/\3',

// SEARCH
//'#^/search-p([0-9]+)/$#' => '/site/search/\1',

'#^/webmaster-submit-off/$#' => '/webmaster/submitDisabled',
'#^/tag-(.*)-t([0-9]+)-p([0-9]+)/$#' => '/site/tag/\2/\1/\3',
'#^/webmaster-choose-method/$#' => '/webmaster/chooseSiteType',
'#^/payment-select-payment-options/$#' => '/payment/selectPaymentOptions',
'#^/payment-make-payment/$#' => '/payment/makePayment',
'#^/payment-process-payment/$#' => '/payment/processPayment',
'#^/webmaster-submit-website-free/$#' => '/webmaster/submitWebsite/basic',
'#^/webmaster-submit-website-privileged/$#' => '/webmaster/submitWebsite/premium',
'#^/webmaster-loading/$#' => '/webmaster/loading',

// CATEGORIES PAGE
'#^/(.*)-c([0-9]+)-p([0-9]+)/$#' => '/site/category/\2/\1/\3'
);

$reverseRewrites = array (
  '#^/category/showAll$#' => '/allcategories/',
  '#^/comment/popup/(.*)$#' => '/comment_s\1/',
  '#^/contact$#' => '/contact/',
  '#^/index.php$#' => '/index/',
  '#^/keyword/show/(.*)$#' => '/mots-\1/',
  '#^/rss/category/(.*)$#' => '/rss-c\1.xml',
  '#^/rss/site/(.*)$#' => '/rss-s\1.xml',
  '#^/rss/news$#' => '/rss-nouveautes.xml',
  '#^/site/details/(.*?)/(.*)$#' => '/\2-s\1/',
  '#^/site/keyword/(.*?)/(.*?)/(.*)$#' => '/mots-\2-m\1-p\3/',
  '#^/site/news$#' => '/nouveautes/',
  '#^/site/problemPopup/(.*)$#' => '/problem_reporting_s\1/',
  '#^/site/topHits$#' => '/top-hits/',
  '#^/site/topNotes$#' => '/top-notes/',
  '#^/site/topRank$#' => '/top-rank/',
  '#^/site/topRank/(.*)$#' => '/top-rank-\1/',
  '#^/site/topReferrers$#' => '/top-referrers/',
  '#^/vote/popup/(.*)$#' => '/vote_s\1/',
  '#^/webmaster/deleteSite/(.*)$#' => '/webmaster-delete-site-\1/',
  '#^/webmaster/editSite/(.*)$#' => '/webmaster-edit-site-\1/',
  '#^/webmaster/logIn$#' => '/webmaster-login/',
  '#^/webmaster/logoff$#' => '/webmaster-logoff/',
  '#^/webmaster/lostPassword$#' => '/webmaster-lost-password/',
  '#^/webmaster/changePassword$#' => '/webmaster-change-password/',
  '#^/webmaster/manage$#' => '/webmaster-management/',
  '#^/webmaster/submitWebsite$#' => '/webmaster-submit-website/',
  '#^/webmaster/submitDisabled$#' => '/webmaster-submit-off/',
  '#^/site/tag/(.*?)/(.*?)/(.*)$#' => '/tag-\2-t\1-p\3/',
  '#^/webmaster/chooseSiteType$#' => '/webmaster-choose-method/',
  '#^/webmaster/submitWebsite/basic$#' => '/webmaster-submit-website-free/',
  '#^/webmaster/submitWebsite/premium$#' => '/webmaster-submit-website-privileged/',
  '#^/webmaster/loading$#' => '/webmaster-loading/',
  '#^/payment/selectPaymentOptions$#' => '/payment-select-payment-options/',
  '#^/payment/makePayment$#' => '/payment-make-payment/',
  '#^/payment/processPayment$#' => '/payment-process-payment/'
);

if(Config::get("advancedUrlRewritingEnabled"))
{
    $reverseRewrites += array('#^/site/category/(.*?)/(.*?)/1$#' => '/\2/',   
                                   '#^/site/category/(.*?)/(.*?)/(.*)$#' => '/\2-p\3/');
}
else
{
    $reverseRewrites += array('#^/site/category/(.*)/(.*)/(.*)$#' => '/\2-c\1-p\3/');
}
