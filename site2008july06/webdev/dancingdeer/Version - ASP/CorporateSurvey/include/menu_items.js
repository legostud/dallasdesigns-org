/*
  --- menu items --- 
  note that this structure has changed its format since previous version.
  additional third parameter is added for item scope settings.
  Now this structure is compatible with Tigra Menu GOLD.
  Format description can be found in product documentation.
*/
var MENU_ITEMS = [
	/*Home*/
	['<img src="images/navmenu-home.gif" width="102" height="25" border="0">', 'default.asp', null],
	/*Products*/
	['<img src="images/navmenu-products.gif" width="102" height="25" border="0">', null, null,
		//['Mother's Day'], 'products.asp?dept=15'],
		['Brownies','products-brownies.asp'],
		['Cookies', 'products-cookies.asp'],
		['Cakes', 'products-cakes.asp'],
		['Medleys', 'products-medleys.asp'],
		/*['Occasions',null,null,
			['Birthday','products_Birthday.asp'],
			['Congratulations','products_Congrats.asp'],
			['Thank you','products_Thanks.asp'],
		],*/
		/*['By Price', null, null,
			['Under $25', 'products.asp?dept=15'],
			['$25 - $50', 'products.asp?dept=17'],
			['Over $50']
		],*/
		['Seasonal', 'Products-Spring06.asp'],
		['Mixes', 'products-mixes.asp'],
		['BULK', 'products.asp?dept=13'],
		['SAMEDAY!!', 'sameday.asp']
	],
	/*About Us*/
	['<img src="images/navmenu-aboutus.gif" width="102" height="25" border="0">', null, null,
		['How We Think', 'howwethink2.asp'],
		['Awards & Honors', 'awards.asp'],
		['In the News', 'news.asp'],
		['Feedback & Fanmail','feedback2.asp'],
		['Care & Handling', 'aboutproduct.asp'],
		['Privacy Policy','privacy.asp'],
		['WBENC Certificate','wbenc.asp'],
		['Alpha Dogs','AlphaDogs.asp']
	],
	/*Order info*/
	['<img src="images/navmenu-orderinfo.gif" width="102" height="25" border="0">', null, null,
		['Track your order','login.asp?dest=statusoforders.asp'],
		['Quick order form','quick-products2.asp'],
		['View Cart','basket.asp'],
	],
	/*contact Us*/
	['<img src="images/navmenu-contactus.gif" width="102" height="25" border="0">', null, null,
		['Contact Us', 'customerservice.asp'],
		['Track Your Order','login.asp?dest=statusoforders.asp'],
		['About our Products','aboutproduct.asp'],
		/*['FAQs'],*/
		['Careers','jobs.asp']
	],
	/*view cart*/
	['<img src="images/navmenu-viewcart.gif" width="102" height="25" border="0">', 'basket.asp', null,
		['View Cart', 'basket.asp']
	],
	/*corporate*/
	['<img src="images/navmenu-corporate.gif" width="102" height="25" border="0">', null, null,
		['Corporate Solutions', 'corporategifts.asp'],
		['Corporate Gifts', 'products_corporate.asp']
	],
	/*Philanthropy*/
	['<img src="images/navmenu-philanthropy.gif" width="102" height="25" border="0">', 'department5.asp', null,
		['Sweet Home Project', 'department5.asp']
	],
]
;

