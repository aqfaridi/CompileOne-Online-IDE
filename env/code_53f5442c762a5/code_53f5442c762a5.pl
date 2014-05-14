use strict;
use warnings;
use HTML::Parser ();
my $parser = HTML::Parser->new(api_version => 3);
$parser->handler( text => sub { print @_ }, 'text');

HTML::Parser::parse($parser, do { local $/; readline DATA });

__DATA__
<TT><PRE>><A HREF="../cgi-bin/hgTracks?hgsid=385873073_APaA5eXoQkYGIbNwOQWJkFmIeUeO&db=hg19&position=chr19:54384240-54384423&hgPcrResult=pack">chr19:54384240+54384423</A> 184bp GATTGGGTCAGAGAGAAAGGG GTCCCTCTCTGGCTCTGTTG
GATTGGGTCAGAGAGAAAGGGacagagacagagacagagaagagaagagg
gagagagattgggtcagagagaaagggacagagacagagaagagaagagg
gagagagagactgagtcatagacaggagagagacccccctagcatcagag
agagagagagagatCAACAGAGCCAGAGAGGGAC
><A HREF="../cgi-bin/hgTracks?hgsid=385873073_APaA5eXoQkYGIbNwOQWJkFmIeUeO&db=hg19&position=chr19:54384296-54384423&hgPcrResult=pack">chr19:54384296+54384423</A> 128bp GATTGGGTCAGAGAGAAAGGG GTCCCTCTCTGGCTCTGTTG
GATTGGGTCAGAGAGAAAGGGacagagacagagaagagaagagggagaga
gagactgagtcatagacaggagagagacccccctagcatcagagagagag
agagagatCAACAGAGCCAGAGAGGGAC
</PRE></TT>
