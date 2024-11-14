-- 12-11-2024
INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`) VALUES (NULL, 'Terms for website', 'Conditions', 'Please use. for new line in invoice. terms and condition.');
-- 13-11-2024
ALTER TABLE setting ADD COLUMN top_offer_visible_status INT(1) DEFAULT 0;
ALTER TABLE setting ADD COLUMN use_web_status INT(1) DEFAULT 0;
INSERT INTO `language` (`id`, `phrase`, `english`, `malay`, `french`, `german`, `spanish`, `turkish`, `hindi`) VALUES (NULL, 'is_use_website', 'Is Use website', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `malay`, `french`, `german`, `spanish`, `turkish`, `hindi`) VALUES (NULL, 'visible_home', 'Is Home Page', NULL, NULL, NULL, NULL, NULL, NULL);
-- 14-11-2024
INSERT INTO `language` (`id`, `phrase`, `english`, `malay`, `french`, `german`, `spanish`, `turkish`, `hindi`) VALUES (NULL, 'factory_rest', 'Factory rest', NULL, NULL, NULL, NULL, NULL, NULL);
ALTER TABLE setting ADD COLUMN blog_offer_visible_status INT(1) DEFAULT 0;
ALTER TABLE setting ADD COLUMN home_about_visible_status INT(1) DEFAULT 0;



