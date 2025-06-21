import {
  useBlockProps,
  RichText,
} from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
  const {
    paragraph,
  } = attributes;

  

  return (
    <div {...useBlockProps()}>
      <RichText 
        tagName="p" 
        value={paragraph} 
        onChange={(value) => setAttributes({ paragraph: value })} 
        placeholder="Paragraph ..." />
    </div>
  );
}
