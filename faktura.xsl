<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Podgląd faktury</title>
</head>
<body>

<h1>Faktura: <xsl:value-of select="faktura/numer"/></h1>
<p>Data: <xsl:value-of select="faktura/data"/></p>

<h2>Sprzedawca</h2>
<p><xsl:value-of select="faktura/sprzedawca/nazwa"/> (NIP: <xsl:value-of select="faktura/sprzedawca/nip"/>)</p>

<h2>Nabywca</h2>
<p><xsl:value-of select="faktura/nabywca/nazwa"/> (NIP: <xsl:value-of select="faktura/nabywca/nip"/>)</p>

<h2>Pozycje</h2>
<table border="1">
    <tr>
        <th>Nazwa</th><th>Ilość</th><th>Cena</th>
    </tr>

    <xsl:for-each select="faktura/pozycje/pozycja">
        <tr>
            <td><xsl:value-of select="nazwa"/></td>
            <td><xsl:value-of select="ilosc"/></td>
            <td><xsl:value-of select="cena"/></td>
        </tr>
    </xsl:for-each>
</table>

</body>
</html>
</xsl:template>

</xsl:stylesheet>
