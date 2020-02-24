import { baseURL } from '../constants.js';

describe('Post: He didn’t learn to read until 12', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/he-didnt-learn-to-read-until-12-then-he-graduated-from-an-ivy-heres-his-advice/')
  })

  it('headline should display "He didn’t learn to read until 12. Then he graduated from an Ivy. Here’s his advice." on page', async () => {
    await expect(page).toMatch('He didn’t learn to read until 12. Then he graduated from an Ivy. Here’s his advice.')
  })
  
  it('should display author "Rupen R. Fofaria" on page', async () => {
    await expect(page).toMatch('Rupen R. Fofaria')
  })
  
  it('should display "She called it “Get Good At Something Day.”" text on page', async () => {
    await expect(page).toMatch('She called it “Get Good At Something Day.”')
  })
  
  it('should display "Recommended for you" section', async () => {
    await expect(page).toMatch('Recommended for you')
  })
  
})


describe('Post: Voter’s Guide 2020', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/candidates-for-nc-state-superintendent-of-public-instruction/')
  })

  it('headline should display "Meet the candidates for state superintendent" on page', async () => {
    await expect(page).toMatchElement('h1', {text: 'Voter’s Guide: Meet the candidates for state superintendent'})
  }, 10000)
  
  it('should display "What grade would you give North Carolina public schools?" text on page', async () => {
    await expect(page).toMatch('What grade would you give North Carolina public schools?')
  }, 10000)
  
  it('should display date "February 13, 2020"', async () => {
    await expect(page).toMatch('February 13, 2020')
  }, 10000)
  
})


describe('Post: Annual Report 2019-2020', () => {
  beforeAll(async () => {
    await page.goto(baseURL + '/annual-report-19-20/');
  })
  
  it('should display "EducationNC’s Annual Report, 2019-20" text on page', async () => {
    await expect(page).toMatch('EducationNC’s Annual Report, 2019-20')
  }, 10000)
  
  it('should display "About EdNC" text on page', async () => {
    await expect(page).toMatchElement('h1', {text: 'About EdNC'})
  }, 10000)
  
  it('should display video on page', async () => {
    await expect(page).toMatchElement('.videoWrapper iframe')
  }, 10000)
  
  it('should display embed on page', async () => {
    await expect(page).toMatchElement('.wp-block-embed-wordpress')
  }, 10000)

})