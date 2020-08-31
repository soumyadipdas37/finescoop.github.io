<entry>
    <id>{{ $entry->getUrl() }}</id>
    <link type="text/html" rel="alternate" href="{{ $entry->getUrl() }}" />
    <title>{{ $entry->title }}</title>

    <?php
        $customDate = explode("-", $entry->date);
        $date = "{$customDate[0]}-{$customDate[1]}-{$customDate[2]} {$customDate[3]}:{$customDate[4]}:{$customDate[5]}";
    ?>

    <published>{{ date(DATE_ATOM, $date) }}</published>
    <updated>{{ date(DATE_ATOM, $date) }}</updated>
    <author>
        <name>{{ $entry->author }}</name>
    </author>
    <summary type="html">{{ $entry->description }}...</summary>
    <content type="html"><![CDATA[
        @includeFirst(['_posts.' . $entry->getFilename(), '_posts._tmp.' . $entry->getFilename()])
    ]]></content>
</entry>
