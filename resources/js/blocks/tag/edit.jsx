import {
  useBlockProps,
  RichText,
} from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
  const {
    text,
  } = attributes;

  

  return (
    <div {...useBlockProps()}>
      <RichText 
        tagName="p" 
        value={text} 
        onChange={(value) => setAttributes({ text: value })} 
        placeholder="Text Tag" />
    </div>
  );
}
