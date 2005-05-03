// developerWorks e-mail to a friend JavaScript
// initialize global var for new window object
// so it can be accessed by all functions on the page
var emailWindow 
// set flag to help out with special handling for window closing
var isIE3 = (navigator.appVersion.indexOf("MSIE 3") != -1) ? true : false
// make the new window and put some stuff in it
function newWindow() {
        var output = ""
        emailWindow = window.open("","subwindow","HEIGHT=500,WIDTH=600,resizable=yes")
        // take care of Navigator 2
        if (emailWindow.opener == null) {
                emailWindow.opener = window
        }
        output += "<html><BODY BGCOLOR='#FFFFFF' TEXT='#000000'>"
        output += "<table border='0' cellpadding='0' cellspacing='0'>"
        output += "<tr valign='top' align='left'>"
        output += "<td colspan='4' width='100%' bgcolor='#cc6633'><img src='../default/i/c.gif' height='5' width='1' alt='spacer gif'></td>"
        output += "</tr>"
        output += "<tr valign='top' align='left'>"
        output += "<td colspan='4' width='100%' bgcolor='#000000'><img src='../default/i/c.gif' height='1' width='1' alt='spacer gif'></td>"
        output += "</tr>"
        output += "<tr valign='top'>"
        output += "<td align='left'><img src='../default/i/c.gif' height='1' width='5' alt='spacer gif'></td>"
        output += "<td align='left'><img src='../default/i/email.gif' height='45' width='215' alt='e-mail it!'></td>"
        output += "<td align='right'><img src='../default/i/dw-logo2.gif' height='27' width='123' alt='developerWorks'></td>"
        output += "<td align='right'><img src='../default/i/c.gif' height='1' width='5' alt='spacer gif'></td>"
        output += "</tr>"
        output += "<tr valign='top'>"
        output += "<td align='left'><img src='../default/i/c.gif' height='1' width='5' alt='spacer gif'></td>"
        output += "<td colspan='2'><font FACE='HELVETICA, HELV, ARIAL' SIZE='-1'>Share this developerWorks content with others who you think will find it interesting, useful, or even amusing. Be sure to separate multiple e-mail addresses with a comma.</font><br /><br /></td>"
        output += "<td align='left'><img src='../default/i/c.gif' height='1' width='5' alt='spacer gif'></td>"
        output += "</tr>"
        output += "<tr valign='top'>"
        output += "<td align='left'><img src='../default/i/c.gif' height='1' width='5' alt='spacer gif'></td>"
        output += "<td colspan='2' bgcolor='#ffcc66'>"
        output += "<form method='post' action='http://www-106.ibm.com/developerworks/cgi-bin/emailfriend.cgi'>"
        output += "<input type=hidden name=subject value=\"" + justTitle + "\">"
        output += "<input type=hidden name=url value=\"" + tutorialPrereqs + "\">"
        output += "<input type=hidden name=body value=\"" + emailAbstract + "\">"
        output += "<table cellpadding=5 cellspacing=0 border=0 width=100%>"
        output += "<tr valign=top align=left>"
        output += "<td width=80><FONT FACE='HELVETICA, HELV, ARIAL' SIZE='-1'><b>Title:</b></FONT></td><td><FONT FACE='HELVETICA, HELV, ARIAL' SIZE='-1'><b>" + justTitle + "</b><br />" + emailAbstract + "</FONT></td>"
        output += "</tr>"
        output += "<tr valign=top align=left>"
        output += "<td width=80><FONT FACE='HELVETICA, HELV, ARIAL' SIZE='-1'><b>Send to:</b></td><td><input type='text' size='30' name='email'></FONT></td>"
        output += "</tr>"
        output += "<tr valign=top align=left>"
        output += "<td width=80><FONT FACE='HELVETICA, HELV, ARIAL' SIZE='-1'><b>Your name:</b></td><td><input type='text' size='30' name='fromName'></FONT></td>"
        output += "</tr>"
        output += "<tr valign=top align=left>"
        output += "<td width=80><FONT FACE='HELVETICA, HELV, ARIAL' SIZE='-1'><b>Your e-mail address:</b></td><td><input type='text' size='30' name='fromEmail'></FONT></td>"
        output += "</tr>"
        output += "<tr valign=top align=left>"
        output += "<td width=80><FONT FACE='HELVETICA, HELV, ARIAL' SIZE='-1'><b>Comments:</b></td><td><textarea name='comments' rows='3' cols='50'></textarea></FONT></td>"
        output += "</tr>"
        output += "<tr valign=top align=left>"
        output += "<td width=80>&nbsp;</td><td><input type='image' border='0' name='Send' src='../default/i/btn-send.gif' border='0' height='19' width='47' alt='send'><A HREF='javascript:void parent.close()'><img src='../default/i/btn-close.gif' border=0 height='19' width='103' alt='Close window'</a></td>"
        output += "</tr>"
        output += "</table>"
        output += "</td>"
        output += "<td align='left'><img src='../default/i/c.gif' height='1' width='5' alt='spacer gif'></td>"
        output += "</tr>"
        output += "</table>"
        output += "</html>"
        emailWindow.document.write(output)
        emailWindow.document.close()
}                  
// close subwindow, including ugly workaround for IE3
function closeWindow() {
        if (isIE3) {
                // if window is already open, nothing appears to happen
                // but if not, the subwindow flashes momentarily (yech!)
                emailWindow = window.open("","subwindow","HEIGHT=200,WIDTH=200")    
        }          
        if (emailWindow && !emailWindow.closed) {
                emailWindow.close()
        }          
}                 
