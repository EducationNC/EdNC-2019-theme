import { baseURL } from '../constants.js';

describe('About page', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/about')
  })

  it('should display "About Us" text on page', async () => {
    await expect(page).toMatch('About Us')
  })
  
  it('should display "Gerry Hancock and Ferrel Guillory" text on page', async () => {
    await expect(page).toMatch(' Gerry Hancock and Ferrel Guillory.')
  })
  
})

describe('News page', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/news')
  })

  it('should find story block ".block-news.content-block-3" on page', async () => {
    await expect(page).toMatchElement('.block-news.content-block-3')
  })
})

describe('Team page', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/team')
  })
  
  it('should display "Mebane Rash" name on page', async () => {
    await expect(page).toMatchElement('h3', {text: "Mebane Rash"})
  })
})

describe('Board of Directors page', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/board-of-directors')
  })
  
  it('should display "Tom Bradshaw" name on page', async () => {
    await expect(page).toMatchElement('h3', {text: "Tom Bradshaw"})
  })
})

describe('Voices page', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/voices')
  })
  
  it('should display "Team" section on page', async () => {
    await expect(page).toMatchElement('h2', {text: "Team"})
  })
  
  it('should display "Mebane Rash" on page', async () => {
    await expect(page).toMatchElement('h4', {text: "Mebane Rash"})
  })
})

describe('EdTalk page', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/edtalk')
  })
  
  it('should display "podcast" text on page', async () => {
    await expect(page).toMatch('podcast')
  })
  
  it('should display article block on page', async () => {
    await expect(page).toMatchElement('.block-news')
  })
  
})