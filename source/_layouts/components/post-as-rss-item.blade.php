<entry>
    <id>{{ $entry->getUrl() }}</id>
    <link type="text/html" rel="alternate" href="{{ $entry->getUrl() }}" />
    <title>{{ $entry->title }}</title>p
    <?php
        $time = DateTime::createFromFormat('Y-m-d-H-i-s', $entry->date);
    ?>
    <published>{{ $time->format(DateTime::ATOM) }}</published>
    <updated>{{ $time->format(DateTime::ATOM) }}</updated>
    <author>
        <name>{{ $entry->author }}</name>
    </author>
    <summary type="html">{{ $entry->description }}...</summary>
    <content type="html"><![CDATA[
        @includeFirst(['_posts.' . $entry->getFilename(), '_posts._tmp.' . $entry->getFilename()])
    ]]></content>
</entry>
