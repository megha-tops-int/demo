// Global variable to hold our stuff
var BP_SC = BP_SC || {};
BP_SC.afl = BP_SC.afl || {};

var s = s || {};

// Default to dev for external link tracking of the stub
s.un = 'telstrabpafldev';

BP_SC.afl.reportingBeacon = function(hierarchy, options) {

	// Define the report suites. Use development until approved to go live.
	switch (window.location.hostname.replace(/^(www\.|m\.)/, '')) {
		case 'junctionstudio.com.au':
					BP_SC.afl.reportsuites = 'telstrabpbigpondprd,telstrabpaflprd';
			break;

		default:
			BP_SC.afl.reportsuites = 'telstrabpafldev';
	}
	s.un = BP_SC.afl.reportsuites;
	var video = false;

	if (typeof(options) !== 'undefined') {
		if (typeof(options.identity) !== 'undefined') {
			s.eVar74 = options.identity;
		}
		if (typeof(options.article !== 'undefined')) {
			if (typeof(options.club) !== 'undefined') {
				s.prop29 = s.eVar61 = 'AFLClubNews:' + options.club + ':' + options.article;
			} else {
				s.prop29 = s.eVar61 = 'AFLNews:' + options.article;
			}
		}

		if (typeof(options.author) !== 'undefined') {
			// 
			s.prop41 = s.eVar53 = options.author;

		}
		
		if (typeof(options.articleCategory) !== 'undefined') {
			// 
			s.prop42 = s.eVar55 = options.articleCategory;
		}
	}

	// If any argument is passed into reportingBeacon(), use it
	if (hierarchy && video === false) {

		BP_SC.afl.hierarchy = hierarchy.split('|');
		s.hier1 = '';
		s.pageName = '';
		var i;
		for (i = 0; i < BP_SC.afl.hierarchy.length; i += 1) {
			
			switch (i) {
				case 0:
					s.prop1 = BP_SC.afl.hierarchy[i];
					s.eVar1 = BP_SC.afl.hierarchy[i];
					break;
				case 1:
					s.prop2 = BP_SC.afl.hierarchy[i];
					s.eVar2 = BP_SC.afl.hierarchy[i];
					break;
				case 2:
					s.prop3 = BP_SC.afl.hierarchy[i];
					s.eVar3 = BP_SC.afl.hierarchy[i];
					break;
				case 3:
					s.channel = BP_SC.afl.hierarchy[i];
					s.eVar4 = BP_SC.afl.hierarchy[i];
					break;
				case 4:
					s.prop4 = BP_SC.afl.hierarchy[i];
					s.eVar5 = BP_SC.afl.hierarchy[i];
					break;
				case 5:
					s.prop5 = BP_SC.afl.hierarchy[i];
					s.eVar15 = BP_SC.afl.hierarchy[i];
					break;
			}
			
			// Build up the hierarchy delimited by pipes
			if (i !== 0) {
				s.hier1 += '|';
			}
			s.hier1 += BP_SC.afl.hierarchy[i];
			
			// s.pageName skips the second level and delimit by colon
			if (i !== 1) {
				if (i !== 0) {
					s.pageName = s.pageName + ':';
				}
				s.pageName = s.pageName + BP_SC.afl.hierarchy[i];
				
			}
			
		}
		var s_code = s.t();
		if (s_code) {
			document.write(s_code);
		}
		s.manageVars("clearVars","eVar74",2)
	}
};

BP_SC.afl.event = function(event) {
	s.linkTrackVars = 'eVar74';
	s.tl(true, 'o', event);
}


/*
 * Utility manageVars v1.4 - clear variable values (requires split 1.5)
 */
s.manageVars=new Function("c","l","f",""
+"var s=this,vl,la,vla;l=l?l:'';f=f?f:1 ;if(!s[c])return false;vl='pa"
+"geName,purchaseID,channel,server,pageType,campaign,state,zip,events"
+",products,transactionID';for(var n=1;n<76;n++){vl+=',prop'+n+',eVar"
+"'+n+',hier'+n;}if(l&&(f==1||f==2)){if(f==1){vl=l;}if(f==2){la=s.spl"
+"it(l,',');vla=s.split(vl,',');vl='';for(x in la){for(y in vla){if(l"
+"a[x]==vla[y]){vla[y]='';}}}for(y in vla){vl+=vla[y]?','+vla[y]:'';}"
+"}s.pt(vl,',',c,0);return true;}else if(l==''&&f==1){s.pt(vl,',',c,0"
+");return true;}else{return false;}");
s.clearVars=new Function("t","var s=this;s[t]='';"); s.lowercaseVars=new Function("t",""
+"var s=this;if(s[t]&&t!='events'){s[t]=s[t].toString();if(s[t].index"
+"Of('D=')!=0){s[t]=s[t].toLowerCase();}}");

/*
 * Utility Function: split v1.5 (JS 1.0 compatible)  */ s.split=new Function("l","d",""
+"var i,x=0,a=new Array;while(l){i=l.indexOf(d);i=i>-1?i:l.length;a[x"
+"++]=l.substring(0,i);l=l.substring(i+d.length);}return a");