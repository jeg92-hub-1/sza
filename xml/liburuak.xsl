<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:template match="/">
	<xsl:for-each select="liburutegia/liburua">
		<table border="1" style="font-size:0.8em;text-align:center">
		<thead style="background-color:grey;color:white">
			<tr>
				<td>ISBN</td>
				<td>HIZKUNTZA</td>
				<td>IZENBURU</td>
				<td>EGILEA</td>
				<td>Portada</td>
				<td>ARGITALETXEA</td>
				<td>URTEA</td>
				<td>GAIA</td>
				<td>SIPNOSIA</td>
				<td>BALORAZIOA</td>
			</tr>
		</thead>
		 <tbody >
			
				<tr>
					<td><xsl:value-of select="@ISBN"/></td>
					<td><xsl:value-of select="@hizkuntza"/></td>
					<td><xsl:value-of select="izenburua"/></td>
					<td><xsl:value-of select="egilea"/></td>
					<td>
						 <xsl:element name="img">
							<xsl:attribute name="src">
								<xsl:value-of select="portada"/>
							</xsl:attribute>
						</xsl:element>
					</td>
					<td><xsl:value-of select="argitaletxea"/></td>
					<td><xsl:value-of select="urtea"/></td>
					<td><xsl:value-of select="gaia"/></td>
					<td><xsl:value-of select="sinopsia"/></td>
					<td><xsl:value-of select="balorazioa"/></td>
				</tr>
			
		  </tbody>
		</table>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>