/**
 * Attach on-delete
 */
as = document.getElementsByTagName("a");
var length = as.length;
for(var i=0; i<length; ++i)
{
	if(as[i].href.match(/delete/g))
	{
		as[i].onclick = function(){
			var value = confirm("Are you sure to delete this record?");
			return value;
		};
	}
}
