<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:template match="/">	
		<table border='1' cellpadding='10'>
		<tr>
		<th>Activity</th>
		<th>Description</th>
		<th>Link</th>
		<th rowspan='0' border='0'><img src='bike.jpg' style='width:100%; display: block; position: relative;'></img></th>
		</tr>
		<xsl:for-each select="SummerFun/ToDo">
		<tr>
			<td><xsl:value-of select="Activity" /></td>
			<td><xsl:value-of select="Description" /></td>
			<td> <a><xsl:attribute name="href"><!-- create the href attribute -->
        <xsl:value-of select="Link"/>
      </xsl:attribute>
      Link
    </a></td>
		</tr>
		</xsl:for-each>
		</table>
	</xsl:template>
</xsl:stylesheet>