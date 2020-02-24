import { baseURL } from '../constants.js';

describe('Homepage', () => {
  beforeAll(async () => {
    await page.goto(baseURL)
  })

  it('should display "Editor\'s Picks" text on page', async () => {
    await expect(page).toMatch('Editor\'s Picks')
  })
  
  it('should display "Explore more at EdNC" text on page', async () => {
    await expect(page).toMatch('Explore more at EdNC')
  })
  
  it('should display "All rights reserved." text on page', async () => {
    await expect(page).toMatch('All rights reserved.')
  })
  
})