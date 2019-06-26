/**
 * External Dependencies
 */
import { put, all, takeEvery } from 'redux-saga/effects';

/**
 * Internal dependencies
 */
import * as types from './types';
import { DEFAULT_STATE } from './reducer';
import * as actions from './actions';

export function* setInitialState( action ) {
	const { get } = action.payload;

	yield all( [
			put( actions.setTitle( get( 'title', DEFAULT_STATE.title ) ) ),
			put( actions.setDisplayImages( get( 'displayImages', DEFAULT_STATE.displayImages ) ) ),
		] );
}

export default function* watchers() {
	yield takeEvery( types.SET_RELATED_EVENTS_INITIAL_STATE, setInitialState );
}