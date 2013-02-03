function show( id ){
  var elem, vis;  
  if( document.getElementById ) // this is the way the standards work
  	elem = document.getElementById( id );
  else if( document.all ) // this is the way old msie versions work
    elem = document.all[id];  
  else if( document.layers ) // this is the way nn4 works
	elem = document.layers[id];  
	
  vis = elem.style;  
  vis.display = 'block';
}
function hide( id ){
  var elem, vis;  
  if( document.getElementById ) // this is the way the standards work
  	elem = document.getElementById( id );
  else if( document.all ) // this is the way old msie versions work
    elem = document.all[id];  
  else if( document.layers ) // this is the way nn4 works
	elem = document.layers[id];  
	
  vis = elem.style;  
  vis.display = 'none';
}