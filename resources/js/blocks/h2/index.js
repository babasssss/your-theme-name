import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import Edit from './edit';
import IconEformaliste from '../icon-e-formaliste';

registerBlockType(metadata.name, {
  ...metadata,
  icon: IconEformaliste,
  edit: Edit,
});
