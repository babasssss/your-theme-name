import {
  useBlockProps,
  RichText,
} from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
  const {
    titleH2,
  } = attributes;

  

  return (
    <div {...useBlockProps()}>
      <RichText 
        tagName="h2" 
        value={titleH2} 
        onChange={(value) => setAttributes({ titleH2: value })} 
        placeholder="Titre H2" />
    </div>
  );
}
