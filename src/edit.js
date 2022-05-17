/**
 * WordPress components that create the necessary UI elements for the block
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-components/
 */
import { TextControl } from '@wordpress/components';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';


/**
 * 
 * Custom react hook for retrieving props from registered selectors.
 * 
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-data/#useselect
 */

import { useSelect } from '@wordpress/data';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @param {Object}   props               Properties passed to the function.
 * @param {Object}   props.attributes    Available block attributes.
 * @param {Function} props.setAttributes Function that updates individual attributes.
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const allPersons = useSelect(select => {
		return select('core').getEntityRecords('postType','mo_persons', {per_page: -1});
	});
	// console.log("HELLO WORLD");

	const blockProps = useBlockProps();

	if(allPersons === null) return <p>Loading...</p>

	return (
		<div className='person_container'>
			<div className="person_select_container">
				<select onChange={(e) => setAttributes({personId: e.target.value}) }>
					<option value="">Select a person</option>
					{
						allPersons.map(person => {
							console.log(person);
							return <option value={person.id} selected={attributes.personId == person.id}>{person.first_name} {person.last_name}</option>
						}
						)
					}
					{/* <option value="1" selected={attributes.personId == 1}>1</option>
					<option value="2" selected={attributes.personId == 2}>2</option>
					<option value="3" selected={attributes.personId == 3}>3</option> */}
				</select>
			</div>
			<div className="person_selected_preview">
				Here will be a preview of the selected person.
			</div>

		</div>
	);
}
