/*
  --- menu level scope settins structure --- 
  note that this structure has changed its format since previous version.
  Now this structure has the same layout as Tigra Menu GOLD.
  Format description can be found in product documentation.
*/
var MENU_POS = [
{
	//width and height of each pulldown menu title cell
	// item sizes
	'height': 40,
	'width': 105,
	// menu block offset from the origin:
	//	for root level origin is upper left corner of the page
	//	for other levels origin is upper left corner of parent item
	'block_top': 0,
	'block_left': 0,
	// offsets between items of the same level
	'top': 0,
	'left': 105,
	// time in milliseconds before menu is hidden after cursor has gone out
	// of any items
	'hide_delay': 200,
	'expd_delay': 200,
	'css' : {
		'outer': ['m0l0oout', 'm0l0oover'],
		'inner': ['m0l0iout', 'm0l0iover']
	}
},
{
	'height': 24,
	'width': 150,
	'block_top': 30,
	'block_left': 0,
	'top': 21,
	'left': 0,
	'css': {
		'outer' : ['m0l1oout', 'm0l1oover'],
		'inner' : ['m0l1iout', 'm0l1iover']
	}
},
{
	'block_top': 5,
	'block_left': 140,
	'css': {
		'outer': ['m0l2oout', 'm0l2oover'],
		'inner': ['m0l2iout', 'm0l2iover']
	}
}
]
