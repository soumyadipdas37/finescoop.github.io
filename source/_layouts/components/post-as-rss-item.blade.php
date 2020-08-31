<entry>
    <id>{{ $entry->getUrl() }}</id>
    <link type="text/html" rel="alternate" href="{{ $entry->getUrl() }}" />
    <title>{{ $entry->title }}</title>

    <?php
        $time = DateTime::createFromFormat('Y-m-d-H-i-s', $entry->date);
    ?>

    <published>{{ date(DATE_ATOM, $time) }}</published>
    <updated>{{ date(DATE_ATOM, $time) }}</updated>
    <author>
        <name>{{ $entry->author }}</name>
    </author>
    <summary type="html">{{ $entry->description }}...</summary>
    <content type="html"><![CDATA[
        @includeFirst(['_posts.' . $entry->getFilename(), '_posts._tmp.' . $entry->getFilename()])
    ]]></content>
</entry>
