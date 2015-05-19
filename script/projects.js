/* 
 * function to display a project's info
 *  -> display those infos in div "projects over"
 *  -> moves div "projects over" to the right place
 * parameters :
 *	-> psHtmlCode : contains the html code sent by ajax responseText 
 */ 
function displayProjectInfos(psHtmlCode){
    var oDivProjectsOver = $('#projectsOver'); 
	
	oDivProjectsOver.html(psHtmlCode);
	//if (oDivProjectsOver.height() < $('#projects').height()) { oDivProjectsOver.css('height', $('#projects').height()) };
	oDivProjectsOver.animate({marginTop:"25%",marginLeft:"-0.96%"});
        oDivProjectsOver.show(300);
}

/* 
 * function to get a project's informations
 *  -> get's project's infos with ajax
 *  -> calls displayProjectInfos()
 * parameters :
 *	-> poDivClickedOn : DOM Object : the div (project) that's been clicked on
 */ 
function getProjectInfos (poDivClickedOn){
    //var oDivProjectsOver = document.getElementById("projectsOver");
    var nIdProject = poDivClickedOn.getAttribute('meta');

    /*if (oDivProjectsOver !== null){
        var nId = oDivProjectsOver.firstElementChild.getAttribute("meta");
        console.log("nId = " +nId);
    }*/
    
    if (nIdProject === '0') { return(''); }
    // define xhr object according to browser
    if (window.XMLHttpRequest){ 
        var oXhr = new XMLHttpRequest();  
    } else if (window.ActiveXObject) { // for IE
        var oXhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    // proceeding
    oXhr.open('GET','controller/ajax.php?todo=getProjectInfo&id=' +nIdProject, true);
    oXhr.send(null);
    
    // checking result
    oXhr.onreadystatechange = function() {
        if (oXhr.readyState === 4 && oXhr.status === 200){    
           displayProjectInfos(oXhr.responseText);
        }
    } 
}

/* 
 * function to animate #projectsOver div (slip right) and hide it
 */ 
function hideProjectInfos() {
	$('#projectsOver').animate({"marginLeft":"1000"});
	$('#projectsOver').hide();
}